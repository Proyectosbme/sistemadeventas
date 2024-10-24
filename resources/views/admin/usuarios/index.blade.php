@php
    $headers = [
        ['text' => 'Rol del usuario', 'align' => 'left'],
        ['text' => 'Usuario', 'align' => 'left'],
        ['text' => 'Correo', 'align' => 'left'],
        ['text' => 'Empresa', 'align' => 'left'],
        ['text' => 'Acciones', 'align' => 'left'],
    ];
@endphp

@extends('adminlte::page')

@section('content_header')
    <x-general.titulo :titulo="'Listado de Usuarios'" :descripcion="'Gestiona los Usuarios registrados en el sistema.'" />

@stop

@section('content')
    <x-contenedor :titulo="'Usuarios registrados'">
        <!-- Contenedor con encabezado y botón de agregar -->
        <x-slot name="slot">
            <x-botones.header-agregar :action="url('/admin/usuarios/create')" :botonTexto="'Agregar'" />
        </x-slot>

        <x-slot name="contenido">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                <x-tablas.tabla :headers="$headers">
                    @foreach ($usuarios as $usuario)
                        <tr
                            class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
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
                <!-- Paginación -->
                <div class="mt-4">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </x-slot>
    </x-contenedor>
@stop

@section('css')
@stop

@section('js')
@stop
