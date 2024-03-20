<x-app-layout>

    <x-table id="catalogTable" label="Kategori" :columns="['Nama', 'Aksi']" :data=$catalogCategories createModalId="add-modal">
        @forelse ($catalogCategories as $item)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $item->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="space-x-2 flex items-center">
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

    <x-basic-modal id="add-modal" title="Tambah Kategori">
        <form action="{{ route('catalog-category.store') }}" method="POST" class="space-y-6"
            enctype="multipart/form-data">
            @csrf
            <x-input id="name" label="Nama" name="name" type="text" required />
            <x-primary-button>Simpan</x-primary-button>
        </form>
    </x-basic-modal>

    <x-basic-modal id="edit-modal" title="Ubah Kategori">
        <div id="result"></div>
    </x-basic-modal>

    <x-delete-modal id="delete-modal" />

    @push('js-internal')
        <script>
            const btnDelete = (id) => {
                const form = $('#delete-modal form');
                let url = '{{ route('catalog-category.destroy', ':id') }}';
                url = url.replace(':id', id);
                form.attr('action', url);
            }

            const btnEdit = (id) => {
                event.preventDefault();
                let url = "{{ route('catalog-category.show', ':id') }}".replace(':id', id);
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        $('#result').html(response);
                        return;
                    },
                    final: function() {
                        return;
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
