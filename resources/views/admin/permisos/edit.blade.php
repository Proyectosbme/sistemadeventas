@extends('adminlte::page')

@section('content_header')
    <h3 class="text-xl font-bold leading-none text-gray-900 blue:text-white">Editar Permiso</h3>
    <hr>
@stop

@section('content')
    <div class="card card-outline card-info" style="box-shadow: 5px 5px 5px 5px #cccccc">
        <div class="w-full col-span-12 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form action="{{ route('admin.permisos.update', $permiso->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del permiso</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $permiso->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción del permiso</label>
                    <textarea id="description" name="description" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description', $permiso->description) }}</textarea>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('admin.permisos.index') }}" class="px-4 py-2 mr-2 text-sm font-medium text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">Cancelar</a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
