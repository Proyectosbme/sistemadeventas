<!-- Componente para el Botón Volver -->
@props(['action', 'text' => 'Volver'])

<a href="{{ $action }}"
   class="px-4 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
    {{ $text }}
</a>
