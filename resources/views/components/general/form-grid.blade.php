@props([
    'columns' => 1,
])

<div class="grid gap-1 py-12 mb-3 md:grid-cols-{{ $columns }}">
    {{ $slot }}
</div>
