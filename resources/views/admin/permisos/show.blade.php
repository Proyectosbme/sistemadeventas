@extends('adminlte::page')

@section('content_header')
    <x-general.titulo-con-hr titulo="Detalle del Permiso" />
@stop

@section('content')
    <div class="card card-outline card-info" style="box-shadow: 5px 5px 5px 5px #cccccc">
        <div class="w-full col-span-12 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <x-general.label-info label="Nombre del permiso" :info="$permiso->name" />
            <x-general.label-info label="Descripción del permiso" :info="$permiso->description ?? 'No tiene descripción'" />
            <x-general.label-info label="Fecha de creación" :info="$permiso->created_at->format('d/m/Y H:i')" />
            <x-general.label-info label="Fecha de última actualización" :info="$permiso->updated_at->format('d/m/Y H:i')" />
            <div class="flex items-center justify-end mt-4">
                <x-botones.volver :action="route('admin.permisos.index')">Volver</x-botones.volver>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop

