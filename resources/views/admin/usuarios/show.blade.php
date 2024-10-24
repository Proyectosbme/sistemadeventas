@extends('adminlte::page')

@section('content_header')
    <x-general.titulo :titulo="'Detalle del usuario: ' . $usuario->name" :descripcion="'Visualiza los datos del usuario almacenado.'" />
    <hr>
@stop

@section('content')
    <!-- Tarjeta de Información del Usuario -->
    <x-contenedor :titulo="'Datos almacenados'">
        <x-slot name="slot">
            <x-botones.volver :action="url('/admin/usuarios/')" />
        </x-slot>

        <x-slot name="contenido">
            <!-- Detalles del Usuario en 2 columnas -->
            <x-general.columna :columns="3">
                <x-general.label-valor label="Identificador" :valor="$usuario->id" />
                <x-general.label-valor label="Nombre del usuario" :valor="$usuario->name" />
                <x-general.label-valor label="Correo" :valor="$usuario->email" />
                <x-general.label-valor label="Empresa" :valor="$usuario->empresa->nombre_empresa" />
                <x-general.label-valor label="Fecha de creación" :valor="$usuario->created_at->format('d/m/Y H:i')" />
                <x-general.label-valor label="Rol" :valor="$usuario->getRoleNames()->first()" />
            </x-general.columna>
        </x-slot>
    </x-contenedor>
@stop

@section('css')
@stop

@section('js')
@stop
