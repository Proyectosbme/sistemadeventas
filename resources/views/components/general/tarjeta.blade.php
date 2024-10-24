@props(['titulo', 'permisos'])

<div class="rounded-lg bg-white shadow-lg p-6 border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-4">{{ $titulo }}</h5>

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
