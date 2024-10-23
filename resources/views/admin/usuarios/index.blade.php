@php
    $headers = [
        ['text' => 'Rol del usuario', 'align' => 'center'],
        ['text' => 'Usuario', 'align' => 'center'],
        ['text' => 'Correo', 'align' => 'center'],
        ['text' => 'Empresa', 'align' => 'center'],
        ['text' => 'Acciones', 'align' => 'center'],
    ];
@endphp

@extends('adminlte::page')

@section('content_header')
<x-general.titulo :titulo="'Listado de Usuarios'" :descripcion="'Gestiona los Usuarios registrados en el sistema.'" />

@stop

@section('content')
    <!-- Contenedor con encabezado y botón de agregar -->
    <x-botones.header-agregar :titulo="'Usuarios registrados'" :action="url('/admin/usuarios/create')" :botonTexto="'Agregar Usuario'" />

    <!-- Tabla de usuarios -->
    <div class="overflow-x-auto">
        <x-tablas.tabla :headers="$headers">
            @foreach ($usuarios as $usuario)
                <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <x-tablas.tabla-td>{{ $usuario->roles->pluck('name')->implode(', ') }}</x-tablas.tabla-td>
                    <x-tablas.tabla-td>{{ $usuario->name }}</x-tablas.tabla-td>
                    <x-tablas.tabla-td>{{ $usuario->email }}</x-tablas.tabla-td>
                    <x-tablas.tabla-td>{{ $usuario->empresa->nombre_empresa }}</x-tablas.tabla-td>
                    <x-tablas.tabla-td-acciones>
                        <x-botones.ver :action="url('/admin/usuarios', $usuario->id)" />
                        <x-botones.editar :action="url('/admin/usuarios/' . $usuario->id . '/edit')" />
                        <x-botones.eliminar-alerta :action="url('/admin/usuarios', $usuario->id)" :formId="'miFormulario' . $usuario->id" />
                    </x-tablas.tabla-td-acciones>
                </tr>
            @endforeach
        </x-tablas.tabla>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $usuarios->links() }}
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
