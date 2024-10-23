@extends('adminlte::page')

@section('content_header')
    <x-general.titulo-con-hr titulo="Crear Permiso" />
@stop

@section('content')
    <div class="card card-outline card-info" style="box-shadow: 5px 5px 5px 5px #cccccc">
        <div class="w-full col-span-12 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form action="{{ route('admin.permisos.store') }}" method="POST">
                @csrf
                <x-general.form-grid :columns="1">
                    <x-general.form-group label="Nombre del permiso" name="name" placeholder="Ingrese el nombre del permiso..." :required="true" :error="$errors->first('name')" />
                    <x-general.form-group-textarea label="Descripción del permiso" name="description" rows="3" placeholder="Ingrese la descripción del permiso..." :required="false" :error="$errors->first('description')" />
                </x-general.form-grid>
                <div class="flex items-center justify-end mt-4">
                    <x-botones.cancelar :action="route('admin.permisos.index')" />
                    <x-botones.crear>Guardar</x-botones.crear>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop

