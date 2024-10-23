<!-- resources/views/components/titulo-con-hr.blade.php -->
@props(['titulo'])

<div class="flex items-center justify-between mb-4">
    <h5 class="text-l font-bold leading-none text-gray-900 dark:text-white">
        {{ $titulo }}
    </h5>
</div>
<hr>
