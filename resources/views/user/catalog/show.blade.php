@extends('guest.index')
@push('css-internal')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
@section('content')
    <div class="row px-8">
        <div class="grid grid-cols-6">
            <div class="col-span-2">
                <img src="{{ asset('storage/catalogs/' . $data->main_image) }}" alt="" id="container-image"
                    class="w-full">
                <div class="flex gap-2 mt-4 overflow-x-auto" id="feature-image">
                    <img src="{{ asset('storage/catalogs/' . $data->main_image) }}" alt=""
                        class="w-20 h-20 object-cover object-center cursor-pointer" onclick="changeImage(this)">
                    @foreach ($data->catalogG as $item)
                        <img src="{{ asset('storage/catalogs/' . $item->catalog_id . '/' . $item->image) }}" alt=""
                            class="w-20 h-20 object-cover object-center cursor-pointer" onclick="changeImage(this)">
                    @endforeach
                </div>
            </div>
            <div class="col-span-4">
                <p class="text-lg font-semibold mb-3">
                    {{ $data->name }}
                </p>
                <div class="bg-gray-50 p-4">
                    @if ($data->discount_price != null && $data->discount_price != 0)
                        <div class="flex justify-between">
                            <div class="flex gap-2 items-center">
                                <span class="text-sm line-through text-gray-500">Rp.
                                    {{ number_format($data->price, 0, ',', '.') }}</span>
                                <span class="text-2xl font-semibold">Rp.
                                    {{ number_format($data->discount_price, 0, ',', '.') }}
                                </span>
                                <span
                                    class="px-2 py-1 text-xs bg-yellow-500 text-white">-{{ number_format((($data->price - $data->discount_price) / $data->price) * 100, 0, ',', '.') }}%</span>
                            </div>
                        </div>
                    @else
                        <span class="text-2xl font-semibold">Rp. {{ number_format($data->price, 0, ',', '.') }}</span>
                    @endif
                </div>
                <div class="space-y-5 p-4">
                    <div class="flex items-center mt-6">
                        <span class="text-sm text-gray-500 w-28">Stok</span>
                        <span class="text-sm  font-semibold">{{ $data->stock }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 w-28">Kategori</span>
                        <span class="text-sm font-semibold">{{ $data->catalogCategory->name }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 w-28">Ukuran</span>
                        <div>
                            @foreach ($data->sizes as $item)
                                <span
                                    class="text-sm font-semibold px-3 py-2 bg-white border border-gray-200">{{ $item }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 w-28">Motif</span>
                        <div class="flex items-center">
                            @foreach ($data->catalogG as $item)
                                <div class="flex items-center bg-white border border-gray-200 p-2 me-2">
                                    <img src="{{ asset('storage/catalogs/' . $item->catalog_id . '/' . $item->image) }}"
                                        alt="" class="w-6 h-6 object-cover object-center">
                                    <span class="text-sm ml-2">{{ $item->label }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex">
                        @if ($data->shopee_link)
                            <a href="{{ $data->shopee_link }}" target="_blank"
                                class="bg-white border border-gray-200 px-4 py-2 text-sm font-semibold">Shopee</a>
                        @endif
                        @if ($data->tokopedia_link)
                            <a href="{{ $data->tokopedia_link }}" target="_blank"
                                class="bg-white border border-gray-200 px-4 py-2 text-sm font-semibold">Tokopedia</a>
                        @endif
                        @if ($data->bukalapak_link)
                            <a href="{{ $data->bukalapak_link }}" target="_blank"
                                class="bg-white border border-gray-200 px-4 py-2 text-sm font-semibold">Bukalapak</a>
                        @endif
                        @if ($data->tiktok_link)
                            <a href="{{ $data->tiktok_link }}" target="_blank"
                                class="bg-white border border-gray-200 px-4 py-2 text-sm font-semibold">Tiktok</a>
                        @endif
                        @if ($data->lazada_link)
                            <a href="{{ $data->lazada_link }}" target="_blank"
                                class="bg-white border border-gray-200 px-4 py-2 text-sm font-semibold">Lazada</a>
                        @endif
                        @if ($data->whatsapp_link)
                            <a href="{{ $data->whatsapp_link }}" target="_blank"
                                class="bg-white border border-gray-200 px-4 py-2 text-sm font-semibold">Whatsapp</a>
                        @endif
                    </div>
                    <div>
                        <p class="font-semibold mb-3 text-gray-400">Deskripsi</p>
                        <div class="text-sm">{!! $data->description !!}</div>
                    </div>
                    <div>
                        <p class="font-semibold mb-3 text-gray-400">Spesifikasi Bahan</p>
                        <div class="text-sm">{!! $data->screen_printing_spec !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('js-internal')
        <script>
            function changeImage(e) {
                const container = document.getElementById('container-image');
                container.src = e.src;

                // add border to this image
                const images = document.getElementById('feature-image').children;
                for (let i = 0; i < images.length; i++) {
                    images[i].classList.remove('border-2', 'border-yellow-700');
                }
                e.classList.add('border-2', 'border-yellow-700');
            }
        </script>
    @endpush
