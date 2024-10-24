@props(['label', 'name', 'value' => '', 'options' => [], 'placeholder' => '', 'error' => null])

<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}"
        class="bg-gray-50 border {{ $error ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" {{ $value == $key ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
    @if ($error)
        <span class="text-red-500 text-sm">{{ $error }}</span>
    @endif
</div>
