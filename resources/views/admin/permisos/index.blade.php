@php
    $headers = [
        ['text' => 'Nombre del permiso', 'align' => 'left'],
        ['text' => 'Descripción', 'align' => 'left'],
        ['text' => 'Acciones', 'align' => 'left'],
    ];
@endphp

@extends('adminlte::page')

@section('content_header')
    <x-general.titulo-con-hr titulo="Listado de Permisos" />
@stop

@section('content')
    <div class="card card-outline card-info" style="box-shadow: 5px 5px 5px 5px #cccccc">
        <div class="row">
            <div class="w-full col-span-12 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <!-- Contenedor del encabezado con botón centrado -->
                <div class="flow-root w-full">
                    <x-botones.header-agregar :titulo="'Permisos registrados'" :action="url('/admin/permisos/create')" :botonTexto="'Agregar'" />

                    <!-- Tabla de permisos usando el componente -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                        <x-tablas.tabla :headers="$headers">
                            @foreach ($permisos as $permiso)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <x-tablas.tabla-td>{{ $permiso->name }}</x-tablas.tabla-td>
                                    <x-tablas.tabla-td>{{ $permiso->description }}</x-tablas.tabla-td>
                                    <x-tablas.tabla-td-acciones>
                                        <x-botones.ver :action="url('/admin/permisos', $permiso->id)" />
                                        <x-botones.editar :action="url('/admin/permisos/' . $permiso->id . '/edit')" />
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
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

<!-- alertas -->
@section('js')
@stop
