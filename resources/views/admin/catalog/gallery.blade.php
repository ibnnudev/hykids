<x-app-layout>
    <x-table id="catalogTable" :columns="['Gambar', 'File', 'Label', 'Aksi']" :data=$galleries createModalId="add-modal" label="Galeri">
        @foreach ($galleries as $gallery)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <img src="{{ asset('storage/catalogs/' . $id . '/' . $gallery->image) }}"
                        class="h-16 w-16 object-cover rounded-md border border-gray-300">
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ asset('storage/catalogs/' . $id . '/' . $gallery->image) }}" target="_blank"
                        class="text-blue-500 hover:underline">
                        {{ $gallery->image }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $gallery->label }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="#" type="button" class="text-red-500" data-modal-toggle="delete-modal"
                        data-modal-target="delete-modal" onclick="btnDelete('{{ $gallery->id }}')">
                        Hapus
                    </a>
                </td>
            </tr>
        @endforeach
    </x-table>

    <x-basic-modal id="add-modal" title="Tambah Foto">
        <form action="{{ route('catalog-gallery.store') }}" method="POST" class="space-y-6"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="catalog_id" value="{{ $id }}">
            <x-input-file name="image" label="Gambar" id="image" required />
            <x-input name="label" label="Label" id="label" required />
            <x-primary-button type="submit">Simpan</x-primary-button>
        </form>
    </x-basic-modal>

    <x-delete-modal id="delete-modal" />

    @push('js-internal')
        <script>
            function btnDelete(id) {
                let url = "{{ route('catalog-gallery.destroy', ':id') }}".replace(':id', id);
                let form = $('#delete-modal').find('form');
                form.attr('action', url);
            }
        </script>
    @endpush
</x-app-layout>
