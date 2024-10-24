@php
    $headers = [
        ['text' => 'Nombre del permiso', 'align' => 'left'],
        ['text' => 'Descripción', 'align' => 'left'],
        ['text' => 'Acciones', 'align' => 'left'],
    ];
@endphp

@extends('adminlte::page')

@section('content_header')
<x-general.titulo :titulo="'Listado de Permisos'" :descripcion="'Gestiona los Permisos registrados en el sistema.'" />
@stop

@section('content')
    <x-contenedor :titulo="'Permisos registrados'">
        <!-- Botón para agregar un nuevo permiso -->
        <x-slot name="slot">
            <x-botones.header-agregar  :action="url('/admin/permisos/create')" :botonTexto="'agregar'" />
        </x-slot>

        <!-- Tabla de permisos usando el componente -->
        <x-slot name="contenido">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                <x-tablas.tabla :headers="$headers">
                    @foreach ($permisos as $permiso)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <x-tablas.tabla-td>{{ $permiso->name }}</x-tablas.tabla-td>
                            <x-tablas.tabla-td>{{ $permiso->description }}</x-tablas.tabla-td>
                            <x-tablas.tabla-td-acciones>
                                <x-botones.ver :action="url('/admin/permisos', $permiso->id)" />
                                <x-botones.editar :action="url('/admin/permisos/' . $permiso->id . '/edit')" />
                                <!-- Botón de eliminar con formulario -->
                                <x-botones.eliminar-alerta :action="url('/admin/permisos', $permiso->id)" :formId="'miFormulario' . $permiso->id" />
                            </x-tablas.tabla-td-acciones>
                        </tr>
                    @endforeach
                </x-tablas.tabla>
                <!-- Enlaces de Paginación -->
                <div class="mt-4">
                    {{ $permisos->links() }}
                </div>
            </div>
        </x-slot>
    </x-contenedor>
@stop


@section('css')
@stop

<!-- alertas -->
@section('js')
@stop
