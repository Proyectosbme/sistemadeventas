@extends('adminlte::page')

@section('content_header')
    <h3 class="text-xl font-bold leading-none text-gray-900 blue:text-white">Detalle del rol {{ $rol->name }}</h3>
    <hr>
@stop

@section('content')
    <div class="card card-outline card-info" style="box-shadow: 5px 5px 5px 5px #cccccc;">
        <div class="row">
            <div class="w-full col-span-12 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-l font-bold leading-none text-gray-900 dark:text-white">Datos almacenados</h5>
                    <a href="{{ url('/admin/roles/') }}"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                d="M12.5 9.75A2.75 2.75 0 0 0 9.75 7H4.56l2.22 2.22a.75.75 0 1 1-1.06 1.06l-3.5-3.5a.75.75 0 0 1 0-1.06l3.5-3.5a.75.75 0 0 1 1.06 1.06L4.56 5.5h5.19a4.25 4.25 0 0 1 0 8.5h-1a.75.75 0 0 1 0-1.5h1a2.75 2.75 0 0 0 2.75-2.75Z"
                                clip-rule="evenodd" />
                        </svg>
                        Regresar
                    </a>
                </div>

                <div class="flow-root">
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h6 class="font-bold text-gray-700 dark:text-gray-400">Identificador:</h6>
                                <p class="text-gray-900 dark:text-white">{{ $rol->id }}</p>
                            </div>
                            <div>
                                <h6 class="font-bold text-gray-700 dark:text-gray-400">Nombre del rol:</h6>
                                <p class="text-gray-900 dark:text-white">{{ $rol->name }}</p>
                            </div>
                            <div>
                                <h6 class="font-bold text-gray-700 dark:text-gray-400">Medio de creación:</h6>
                                <p class="text-gray-900 dark:text-white">{{ $rol->guard_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
