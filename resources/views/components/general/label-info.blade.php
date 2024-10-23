@props([
    'label',
    'info' => null,
])

<div class="mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <p class="text-gray-700 dark:text-gray-300">{{ $info ?? 'No disponible' }}</p>
</div>
