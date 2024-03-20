<form action="{{ route('catalog-category.update', $data->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')
    <x-input id="name" label="Nama" name="name" type="text" required :value="$data->name" />
    <x-primary-button>Simpan</x-primary-button>
</form>
