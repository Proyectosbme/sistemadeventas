@extends('adminlte::page')

@section('content_header')
    <h3 class="text-xl font-bold leading-none text-gray-900 blue:text-white">Detalle del Permiso</h3>
    <hr>
@stop

@section('content')
    <div class="card card-outline card-info" style="box-shadow: 5px 5px 5px 5px #cccccc">
        <div class="w-full col-span-12 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del permiso:</label>
                <p class="text-gray-700 dark:text-gray-300">{{ $permiso->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción del permiso:</label>
                <p class="text-gray-700 dark:text-gray-300">{{ $permiso->description ?? 'No tiene descripción' }}</p>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de creación:</label>
                <p class="text-gray-700 dark:text-gray-300">{{ $permiso->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de última actualización:</label>
                <p class="text-gray-700 dark:text-gray-300">{{ $permiso->updated_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('admin.permisos.index') }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">Volver</a>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
