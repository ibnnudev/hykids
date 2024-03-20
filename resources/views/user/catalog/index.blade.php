@extends('guest.index')
@push('css-internal')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
@section('content')
    <div class="row px-8">
        <div class="grid grid-cols-12">
            <div class="col-span-2 text-sm">
                <h3 class="font-bold">Kategori</h3>
                <hr class="bg-gray-100 my-4">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('user.catalog.index') }}"
                            class="font-medium
                        {{ request()->get('category') == null ? 'text-yellow-700' : '' }}
                        ">Semua
                            Kategori</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="mb-4">
                            <a href="{{ route('user.catalog.index', ['category' => $category->id]) }}"
                                class="font-medium {{ request()->get('category') == $category->id ? 'text-yellow-700' : '' }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-span-10 text-sm">
                <div class="flex gap-3 items-center mb-6">
                    <p>Urutkan</p>
                    <a type="button" href="{{ route('user.catalog.index', ['sort' => 'latest']) }}"
                        class="{{ request()->get('sort') == 'latest' ? 'bg-yellow-700 text-white' : 'bg-white text-black' }} border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2">Terbaru</a>
                    <a type="button" href="{{ route('user.catalog.index', ['sort' => 'cheapest']) }}"
                        class="{{ request()->get('sort') == 'cheapest' ? 'bg-yellow-700 text-white' : 'bg-white text-black' }} border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2">Termurah</a>
                    <a type="button" href="{{ route('user.catalog.index', ['sort' => 'expensive']) }}"
                        class="{{ request()->get('sort') == 'expensive' ? 'bg-yellow-700 text-white' : 'bg-white text-black' }} border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2">Termahal</a>
                    {{-- page --}}
                    <div class="flex gap-2 items-center ml-auto">
                        <p class="me-2">
                            {{ $catalogs->currentPage() }}
                            dari
                            {{ $catalogs->lastPage() }}
                        </p>
                        @if ($catalogs->currentPage() != 1)
                            <a href="{{ $catalogs->previousPageUrl() }}"
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-3 py-2.5 me-2 mb-2">Sebelumnya</a>
                        @endif
                        @if ($catalogs->currentPage() != $catalogs->lastPage())
                            <a href="{{ $catalogs->nextPageUrl() }}"
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-3 py-2.5 me-2 mb-2">Selanjutnya</a>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-5 gap-4">
                    @forelse ($catalogs as $item)
                        <div onclick="window.location.href='{{ route('user.catalog.show', $item->id) }}'"
                            class="bg-white shadow-md cursor-pointer transition duration-300 ease-in-out hover:shadow-lg hover:scale-105">
                            <img src="{{ asset('storage/catalogs/' . $item->main_image) }}" alt="{{ $item->name }}"
                                class="h-20 object-cover object-center mb-2">
                            <div class="px-2 py-2">
                                <p class="mb-2 line-clamp-2 hover:line-clamp-none text-xs">{{ $item->name }}</p>
                                @if ($item->discount_price != null && $item->discount_price != 0)
                                    <div class="flex items-center gap-2">
                                        <p class="text-sm line-through text-gray-500">Rp.
                                            {{ number_format($item->price, 0, ',', '.') }}</p>
                                        <p class="text-sm font-medium text-yellow-700">Rp.
                                            {{ number_format($item->discount_price, 0, ',', '.') }}</p>
                                    </div>
                                @else
                                    <p class="text-sm font-medium text-yellow-700">Rp.
                                        {{ number_format($item->price, 0, ',', '.') }}</p>
                                @endif
                            </div>
                            <a href="{{ route('user.catalog.show', $item->id) }}"
                                class="block text-center bg-yellow-700 text-white hover:text-yellow-200 py-2 mt-3 text-xs">Lihat
                                Detail</a>
                        </div>
                    @empty
                        <div class="col-span-5 text-center">
                            <p>Produk tidak ditemukan</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
