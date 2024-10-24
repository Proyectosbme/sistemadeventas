
@props([ 'action', 'botonTexto'])
<div class="flex justify-between items-center mb-6">
    <a href="{{ $action }}"
       class="btn btn-primary btn-sm inline-flex items-center">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
        {{ $botonTexto }}
    </a>
</div>
