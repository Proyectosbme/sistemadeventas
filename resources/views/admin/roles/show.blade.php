@extends('adminlte::page')

@section('content_header')
    <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white">Detalles del Rol: {{ $rol->name }}</h3>
    <p class="text-md text-gray-500 dark:text-gray-400">Visualiza la información del rol y sus permisos asignados.</p>
    <hr class="mt-2 mb-6 border-t-2 border-gray-300">
@stop

@section('content')
    <div class="flex flex-col space-y-6">
        <!-- Tarjeta de Información del Rol -->
        <div class="rounded-lg bg-white shadow-lg p-6 border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Información del Rol</h5>
                <a href="{{ url('/admin/roles/') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Regresar
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Detalles del Rol -->
                <div>
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Identificador:</p>
                    <p class="text-lg text-gray-900 dark:text-white">{{ $rol->id }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Nombre del Rol:</p>
                    <p class="text-lg text-gray-900 dark:text-white">{{ $rol->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Medio de Creación:</p>
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                        {{ $rol->guard_name }}
                    </span>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Fecha de Creación:</p>
                    <p class="text-lg text-gray-900 dark:text-white">{{ $rol->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Última Modificación:</p>
                    <p class="text-lg text-gray-900 dark:text-white">{{ $rol->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Permisos Asignados -->
        <div class="rounded-lg bg-white shadow-lg p-6 border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Permisos Asignados</h5>
            @if ($permisos->isEmpty())
                <p class="text-lg text-gray-900 dark:text-white">No hay permisos asignados a este rol.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($permisos as $permiso)
                        <div class="flex items-center space-x-2 bg-gray-50 p-3 rounded-lg border border-gray-300 dark:bg-gray-900 dark:border-gray-700">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $permiso->name }}</span>
                            <span class="inline-flex items-center justify-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                Asignado
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Estilos personalizados */
        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
@stop

@section('js')
    <script>
        // Puedes agregar alguna interacción aquí si es necesario
    </script>
@stop
