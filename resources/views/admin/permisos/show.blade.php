@extends('adminlte::page')

@section('content_header')
    <x-general.titulo :titulo="'Detalle del Permiso'" :descripcion="'Vista de los Permisos registrados en el sistema.'" />
@stop

@section('content')
    <!-- Tarjeta de Información del Rol -->
    <x-contenedor :titulo="'Permisos registrados'">

        <x-slot name="contenido">
            <x-general.columna :columns="2"> <!-- Distribuir en 2 columnas -->
                <x-general.label-valor label="Nombre del permiso" :valor="$permiso->name" />
                <x-general.label-valor label="Descripción del permiso" :valor="$permiso->description ?? 'No tiene descripción'" />
                <x-general.label-valor label="Fecha de creación" :valor="$permiso->created_at->format('d/m/Y H:i')" />
                <x-general.label-valor label="Fecha de última actualización" :valor="$permiso->updated_at->format('d/m/Y H:i')" />
            </x-general.columna>
            <div class="flex items-center justify-end mt-4">
                <x-botones.volver :action="route('admin.permisos.index')">Volver</x-botones.volver>
            </div>
        </x-slot>
    </x-contenedor>
@stop

@section('css')
@stop

@section('js')
@stop
