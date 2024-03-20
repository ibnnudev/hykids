@props(['id', 'label', 'name', 'type' => 'file', 'required' => false, 'value' => ''])

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $id }}">
        {{ $label }} @if ($value !== '' && $value !== null)
            <span class="text-gray-400">(kosongkan jika tidak ingin mengganti gambar)</span>
        @elseif ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        value="{{ $value }}" id="{{ $id }}" type="file" name="{{ $name }}"
        {{ $required ? 'required' : '' }}>

    @if ($value !== '' && $value !== null)
        <img src="{{ $value }}" class="mt-2 h-16 w-16 object-cover rounded-sm" />
    @endif

    @error($id)
        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
