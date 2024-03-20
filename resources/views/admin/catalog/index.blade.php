<x-app-layout>
    @push('css-internal')
        <link rel="stylesheet" href="{{ asset('vendor/summernote-0.8.18-dist/summernote-lite.min.css') }}">
    @endpush

    <x-table id="catalogTable" label="Katalog" :columns="['Nama', 'Kategori', 'Ukuran', 'Harga', 'Diskon', 'Stok', 'Tautan', 'Aksi']" :data=$catalogs createModalId="add-modal">
        @forelse ($catalogs as $item)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded object-cover"
                                src="{{ asset('storage/catalogs/' . $item->main_image) }}" alt="{{ $item->name }}">
                        </div>
                        <div class="ml-4">
                            <p
                                class="text-sm font-medium text-gray-900 dark:text-gray-200 w-40 text-wrap line-clamp-2 hover:line-clamp-none">
                                {{ $item->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div
                        class="text-sm text-gray-900 dark:text-gray-200 w-20 text-wrap line-clamp-2 hover:line-clamp-none">
                        {{ $item->catalogCategory->name ?? '-' }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 dark:text-gray-200">
                        @foreach ($item->sizes as $size)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-xs bg-gray-50 text-gray-800">
                                {{ $size }}
                            </span>
                        @endforeach
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 dark:text-gray-200">
                        Rp. {{ number_format($item->price, 0, ',', '.') }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 dark:text-gray-200">
                        @if ($item->discount_price != 0 || $item->discount_price != null)
                            Rp. {{ number_format($item->discount_price, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->stock == 'Tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $item->stock }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                    @if ($item->shopee_link != null)
                        <a href="{{ $item->shopee_link }}" target="_blank" class="font-medium">Shopee</a>
                    @endif
                    @if ($item->tokopedia_link != null)
                        <a href="{{ $item->tokopedia_link }}" target="_blank" class="font-medium">Tokopedia</a>
                    @endif
                    @if ($item->bukalapak_link != null)
                        <a href="{{ $item->bukalapak_link }}" target="_blank" class="font-medium">Bukalapak</a>
                    @endif
                    @if ($item->tiktok_link != null)
                        <a href="{{ $item->tiktok_link }}" target="_blank" class="font-medium">Tiktok</a>
                    @endif
                    @if ($item->lazada_link != null)
                        <a href="{{ $item->lazada_link }}" target="_blank" class="font-medium">Lazada</a>
                    @endif
                    @if ($item->whatsapp_link != null)
                        <a href="{{ $item->whatsapp_link }}" target="_blank" class="font-medium">Whatsapp</a>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="space-x-2 flex items-center">
                        <a href="{{ route('catalog.gallery', $item->id) }}" data-tooltip-target="gallery-tooltip"
                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">
                            <svg class="w-4 h-4 text-primary-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8 12.732A1.99 1.99 0 0 1 7 13H3v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2h-2a4 4 0 0 1-4-4v-2.268ZM7 11V7.054a2 2 0 0 0-1.059.644l-2.46 2.87A2 2 0 0 0 3.2 11H7Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M14 3.054V7h-3.8c.074-.154.168-.3.282-.432l2.46-2.87A2 2 0 0 1 14 3.054ZM16 3v4a2 2 0 0 1-2 2h-4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-3Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        {{-- <a href="{{ route('catalog.detail', $item->id) }}" data-tooltip-target="detail-tooltip"
                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">
                            <svg class="w-4 h-4 text-green-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16Z" />
                                <path fill-rule="evenodd"
                                    d="M21.707 21.707a1 1 0 0 1-1.414 0l-3.5-3.5a1 1 0 0 1 1.414-1.414l3.5 3.5a1 1 0 0 1 0 1.414Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a> --}}
                        <button type="button" data-modal-toggle="edit-modal" data-modal-target="edit-modal"
                            onclick="btnEdit('{{ $item->id }}')" data-tooltip-target="edit-tooltip"
                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">
                            <svg class="w-4 h-4 text-yellow-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </button>
                        <a href="#" data-modal-toggle="delete-modal" data-modal-target="delete-modal"
                            onclick="btnDelete('{{ $item->id }}')" data-tooltip-target="delete-tooltip"
                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">
                            <svg class="w-4 h-4 text-red-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td class="px-6 py-4 whitespace-nowrap" colspan="6">
                    <div class="text-sm text-gray-500 dark:text-gray-400 text-center">
                        Tidak ada data yang tersedia
                    </div>
                </td>
            </tr>
        @endforelse
    </x-table>

    <x-tooltip id="gallery-tooltip" tooltip="Galeri" />
    <x-tooltip id="edit-tooltip" tooltip="Ubah" />
    <x-tooltip id="delete-tooltip" tooltip="Hapus" />
    {{-- <x-tooltip id="detail-tooltip" tooltip="Detail" /> --}}

    <x-basic-modal id="add-modal" title="Tambah Katalog">
        <form action="{{ route('catalog.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <x-input id="name" label="Nama" name="name" type="text" required />
            <x-select id="catalog_category_id" label="Kategori" name="catalog_category_id" required>
                <option value="" disabled>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-select>
            <x-input id="price" label="Harga" name="price" type="text" required />
            <x-input id="discount_price" label="Harga Diskon" name="discount_price" type="text" />
            <x-input id="shopee_link" label="Link Shopee" name="shopee_link" type="text" />
            <x-input id="tokopedia_link" label="Link Tokopedia" name="tokopedia_link" type="text" />
            <x-input id="bukalapak_link" label="Link Bukalapak" name="bukalapak_link" type="text" />
            <x-input id="tiktok_link" label="Link Tiktok" name="tiktok_link" type="text" />
            <x-input id="lazada_link" label="Link Lazada" name="lazada_link" type="text" />
            <x-input id="whatsapp_link" label="Link Whatsapp" name="whatsapp_link" type="text" />
            <x-select id="stock" label="Stok" name="stock" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
            </x-select>
            <div>
                <label for="" class="mb-3 text-sm inline-block">
                    Ukuran Tersedia
                    <span class="text-red-500">*</span>
                </label>
                <x-checkbox>
                    <x-checkbox-item id="S" label="S" name="sizes[]" value="S" />
                    <x-checkbox-item id="M" label="M" name="sizes[]" value="M" />
                    <x-checkbox-item id="L" label="L" name="sizes[]" value="L" />
                    <x-checkbox-item id="XL" label="XL" name="sizes[]" value="XL" />
                    <x-checkbox-item id="XXL" label="XXL" name="sizes[]" value="XXL" />
                </x-checkbox>
            </div>
            <x-textarea id="description" label="Deskripsi" name="description" required />
            <x-textarea id="screen_printing_spec" label="Spesifikasi Bahan" name="screen_printing_spec" required />
            <x-input-file id="main_image" label="Gambar Utama" name="main_image" required />
            <x-primary-button>Simpan</x-primary-button>
        </form>
    </x-basic-modal>

    <x-basic-modal id="edit-modal" title="Ubah Katalog">
        <div id="result"></div>
    </x-basic-modal>

    <x-delete-modal id="delete-modal" />

    @push('js-internal')
        <script src="{{ asset('vendor/summernote-0.8.18-dist/summernote-lite.min.js') }}"></script>
        <script>
            const note = () => {
                $('textarea.textarea-input').summernote({
                    tabsize: 2,
                    height: 100,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                    ],
                });
            }

            const rupiahFormat = (value) => {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                }).format(value);
            }

            const btnDelete = (id) => {
                const form = $('#delete-modal form');
                let url = '{{ route('catalog.destroy', ':id') }}';
                url = url.replace(':id', id);
                form.attr('action', url);
            }

            const btnEdit = (id) => {
                event.preventDefault();
                let url = '{{ route('catalog.show', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        $('#result').html(response);
                        formatPriceInputs();
                        note();
                        return;
                    },
                    final: function() {
                        formatPriceInputs();
                        note();
                        return;
                    }
                });
            }

            const formatPriceInputs = () => {
                $('input[name="price"]').on('input', function() {
                    $(this).val(function(index, value) {
                        return rupiahFormat(value.replace(/\D/g, ''));
                    });
                });

                $('input[name="discount_price"]').on('input', function() {
                    $(this).val(function(index, value) {
                        return rupiahFormat(value.replace(/\D/g, ''));
                    });
                });
            }

            formatPriceInputs();
            note();
        </script>
    @endpush
</x-app-layout>
