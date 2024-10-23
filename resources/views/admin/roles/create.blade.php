@extends('adminlte::page')

@section('content_header')
    <x-general.titulo :titulo="'Creción de Roles'" :descripcion="'Gestiona los roles en el sistema.'" />
@stop

@section('content')
    <div class="row mx-auto w-full">
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <x-general.titulo-con-hr titulo="Ingrese los datos del rol" />
            <div class="flow-root">
                <form action="{{ route('admin.roles.store') }}" method="post">
                    @csrf
                    <x-general.form-grid :columns="2">
                        <x-general.form-group label="Nombre del rol" name="name" :value="old('name')"
                            placeholder="Ingrese el nombre del rol..." :required="true" :error="$errors->first('name')" />
                        <x-general.form-group label="Descripción del rol" name="description" :value="old('description')"
                            placeholder="Ingrese la descripción del rol..." :required="true" :error="$errors->first('description')" />
                    </x-general.form-grid>
                    <x-general.titulo-centrado titulo="Detalle de permisos" />

                    <x-picklist.picklist :items="$permissions" tituloDisponibles="Permisos disponibles"
                        tituloAsignados="Permisos asignados" placeholderDisponibles="Buscar permisos..."
                        placeholderAsignados="Buscar permisos asignados..." inputName="permissions" />
                    <!-- Botones para guardar o cancelar -->
                    <x-botones.cancelar :action="route('admin.roles.index')" />
                    <x-botones.crear>Crear Rol</x-botones.crear>
                </form>
            </div>
        </div>
    </div>
@stop
