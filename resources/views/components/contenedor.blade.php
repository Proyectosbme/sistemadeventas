@props(['titulo'])

<div class="card card-outline card-info" style="box-shadow: 5px 5px 5px 5px #cccccc">
    <div class="row">
        <div class="w-full col-span-12 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flow-root w-full">
                <!-- Contenedor del encabezado con título dinámico y slot para botón -->
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $titulo }}</h5>
                    {{ $slot }}
                </div>
                <!-- Aquí irá el contenido que se pase al contenedor -->
                {{ $contenido ?? '' }}
            </div>
        </div>
    </div>
</div>
