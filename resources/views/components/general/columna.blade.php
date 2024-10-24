@props(['columns' => 2]) <!-- Por defecto serán 2 columnas -->

<div class="grid grid-cols-1 md:grid-cols-{{ $columns }} gap-6">
    {{ $slot }}
</div>
