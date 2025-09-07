@props(['id', 'name', 'options' => [], 'selected' => null, 'label' => null, 'value' => ''])
<div class="mb-4">
    @if ($label)
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $id }}"
        class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror">
        <option value="">{{ $slot->isEmpty() ? 'Select an option' : $slot }}</option>
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($name, $selected) == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}</option>
        @endforeach

    </select>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
