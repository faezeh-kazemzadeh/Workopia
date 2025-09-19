   @props(['name', 'id', 'label' => ''])
   <div class="mb-4">
       @if ($label)
           <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
       @endif
       <input type="file" name="{{ $name }}" id="{{ $id }}"
           class="w-full px-4 py-2 border border-gray-500/50 rounded focus:outline-none @error($name) border-red-500 @enderror">
       @error($name)
           <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
       @enderror
   </div>
