@props([
    'titulo',
    'descripcion' => '',
])

<div class="mb-4">
    <h3 class="text-2xl font-bold leading-none text-gray-900 dark:text-white">{{ $titulo }}</h3>
    @if ($descripcion)
        <p class="text-md text-gray-500 dark:text-gray-400">{{ $descripcion }}</p>
    @endif
    <hr class="mt-2 mb-1 border-t-2 border-gray-300 dark:border-gray-600">
</div>
