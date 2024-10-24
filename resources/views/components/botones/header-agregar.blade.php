@props([ 'action', 'botonTexto'])

<div class="flex justify-between items-center mb-6">

    <a href="{{ $action }}"
       class="btn btn-primary btn-sm inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        {{ $botonTexto }}
    </a>
</div>
