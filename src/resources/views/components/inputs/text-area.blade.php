@props(['id', 'name', 'label' => '', 'value' => '', 'placeholder' => '', 'cols' => 30, 'rows' => 7])
<div class="mb-4">
    @if ($label)
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
    @endif
    <textarea cols="{{ $cols }}" rows="{{ $rows }}" name="{{ $name }}" id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        class="w-full px-4 py-2 border rounded focus:outline-none @error('{{ $name }}') border-red-500 @enderror">{{ old($name, $value ?? '') }}</textarea>
    @error('{{ $name }}')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
