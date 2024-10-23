@props([
    'label',
    'name',
    'value' => '',
    'placeholder' => '',
    'rows' => 3,
    'required' => false,
    'error' => null,
])

<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
    </label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}"
              class="bg-gray-50 border {{ $error ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    @if ($error)
        <span class="text-red-500 text-sm">{{ $error }}</span>
    @endif
</div>
