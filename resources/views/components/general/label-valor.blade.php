@props(['label', 'valor', 'tipo' => 'texto'])

<div class="mb-4">
    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ $label }}:</p>
    @if ($tipo === 'texto')
        <p class="text-lg text-gray-900 dark:text-white">{{ $valor }}</p>
    @elseif ($tipo === 'span')
        <span
            class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
            {{ $valor }}
        </span>
    @endif
</div>
