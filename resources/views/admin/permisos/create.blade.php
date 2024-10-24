@extends('adminlte::page')

@section('content_header')
    <x-general.titulo :titulo="'Creción de permisos'" :descripcion="'Gestiona los permisos en el sistema.'" />
@stop

@section('content')
    <x-contenedor :titulo="'Ingrese los datos del permiso'">
        <x-slot name="contenido">
            <form action="{{ route('admin.permisos.store') }}" method="POST">
                @csrf
                <x-general.form-grid :columns="1">
                    <x-general.form-group label="Nombre del permiso" name="name"
                        placeholder="Ingrese el nombre del permiso..." :required="true" :error="$errors->first('name')" />
                    <x-general.form-group-textarea label="Descripción del permiso" name="description" rows="3"
                        placeholder="Ingrese la descripción del permiso..." :required="false" :error="$errors->first('description')" />
                </x-general.form-grid>

                <x-botones.cancelar :action="route('admin.permisos.index')" />
                <x-botones.crear>Crear permiso</x-botones.crear>

            </form>
        </x-slot>
    </x-contenedor>
@stop

@section('css')
@stop

@section('js')
@stop
