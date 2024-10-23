@php
    $headers = [
        ['text' => 'Nombre del Rol', 'align' => 'left'],
        ['text' => 'Descripción', 'align' => 'left'],
        ['text' => 'Acciones', 'align' => 'left'],
    ];
@endphp

@extends('adminlte::page')

@section('content_header')
    <x-general.titulo :titulo="'Listado de Roles'" :descripcion="'Gestiona los roles registrados en el sistema.'" />
@stop

@section('content')
    <!-- Encabezado con botón para agregar roles -->
    <x-botones.header-agregar :titulo="'Roles registrados'" :action="url('/admin/roles/create')" :botonTexto="'Agregar Rol'" />

    <!-- Tabla de roles usando el componente -->
    <div class="overflow-x-auto">
        <x-tablas.tabla :headers="$headers">
            @foreach ($roles as $rol)
                <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <x-tablas.tabla-td>{{ $rol->name }}</x-tablas.tabla-td>
                    <x-tablas.tabla-td>{{ $rol->description }}</x-tablas.tabla-td>
                    <x-tablas.tabla-td-acciones>
                        <x-botones.ver :action="url('/admin/roles', $rol->id)" />
                        <x-botones.editar :action="url('/admin/roles/' . $rol->id . '/edit')" />
                        <x-botones.eliminar-alerta :action="url('/admin/roles', $rol->id)" :formId="'miFormulario' . $rol->id" />
                    </x-tablas.tabla-td-acciones>
                </tr>
            @endforeach
        </x-tablas.tabla>
    </div>
    <!-- Paginación -->
    <div class="mt-4">
        {{ $roles->links() }}
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
