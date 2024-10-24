@extends('adminlte::page')

@section('content_header')
    <x-general.titulo :titulo="'Detalles del Rol: ' . $rol->name" :descripcion="'Visualiza la información del rol y sus permisos asignados.'" />
@stop


@section('content')

    <!-- Tarjeta de Información del Rol -->
    <x-contenedor :titulo="'Permisos registrados'">

        <x-slot name="contenido">
            <x-general.columna :columns="3"> <!-- Distribuir en 2 columnas -->
                <!-- Detalles del Rol usando el componente de label-valor -->
                <x-general.label-valor label="Identificador" :valor="$rol->id" />
                <x-general.label-valor label="Nombre del Rol" :valor="$rol->name" />
                <x-general.label-valor label="Medio de Creación" :valor="$rol->guard_name" tipo="span" />
                <x-general.label-valor label="Fecha de Creación" :valor="$rol->created_at->format('d/m/Y H:i')" />
                <x-general.label-valor label="Última Modificación" :valor="$rol->updated_at->format('d/m/Y H:i')" />
            </x-general.columna>
            <x-general.tarjeta :titulo="'Permisos Asignados'" :permisos="$permisos" />
            <x-botones.volver :action="route('admin.roles.index')">Volver</x-botones.volver>
        </x-slot>
    </x-contenedor>
@stop

@section('css')
@stop

@section('js')
@stop
