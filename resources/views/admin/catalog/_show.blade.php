<form action="{{ route('catalog.update', $catalog->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-input id="name" label="Nama" name="name" type="text" required :value="$catalog->name" />
    <x-select id="catalog_category_id" label="Kategori" name="catalog_category_id" required>
        <option value="" disabled>Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $catalog->catalog_category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </x-select>
    <x-input id="price" label="Harga" name="price" type="text" required :value="'Rp ' . number_format($catalog->price, 0, ',', '.')" />
    <x-input id="discount_price" label="Harga Diskon" name="discount_price" type="text" :value="'Rp ' . number_format($catalog->discount_price, 0, ',', '.')" />
    <x-input id="shopee_link" label="Link Shopee" name="shopee_link" type="text" :value="$catalog->shopee_link" />
    <x-input id="tokopedia_link" label="Link Tokopedia" name="tokopedia_link" type="text" :value="$catalog->tokopedia_link" />
    <x-input id="bukalapak_link" label="Link Bukalapak" name="bukalapak_link" type="text" :value="$catalog->bukalapak_link" />
    <x-input id="tiktok_link" label="Link Tiktok" name="tiktok_link" type="text" :value="$catalog->tiktok_link" />
    <x-input id="lazada_link" label="Link Lazada" name="lazada_link" type="text" :value="$catalog->lazada_link" />
    <x-input id="whatsapp_link" label="Link Whatsapp" name="whatsapp_link" type="text" :value="$catalog->whatsapp_link" />
    <x-select id="stock" label="Stok" name="stock" required>
        <option value="Tersedia" {{ $catalog->stock == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
        <option value="Habis" {{ $catalog->stock == 'Habis' ? 'selected' : '' }}>Habis</option>
    </x-select>
    <div>
        <label class="mb-3 text-sm inline-block">
            Ukuran Tersedia
            <span class="text-red-500">*</span>
        </label>
        <x-checkbox>
            @foreach (['S', 'M', 'L', 'XL', 'XXL'] as $size)
                <x-checkbox-item id="{{ $size }}" name="sizes[]" value="{{ $size }}" :checked="in_array($size, $catalog->sizes)"
                    label="{{ $size }}" />
            @endforeach
        </x-checkbox>
    </div>
    <x-textarea id="description" label="Deskripsi" name="description" :value="$catalog->description" />
    <x-textarea id="screen_printing_spec" label="Spesifikasi Bahan" name="screen_printing_spec" :value="$catalog->screen_printing_spec" />
    <x-input-file id="main_image" label="Gambar Utama" name="main_image" :value="asset('storage/catalogs/' . $catalog->main_image)" />

    <x-primary-button>Simpan</x-primary-button>
</form>
