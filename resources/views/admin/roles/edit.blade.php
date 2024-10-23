@extends('adminlte::page')

@section('content_header')
    <x-general.titulo-con-hr titulo="Editar Rol" />
@stop

@section('content')

    <div class="row mx-auto w-full">
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <x-general.titulo-con-hr titulo="Modifique los datos del rol" />
            <div class="flow-root">
                <form action="{{ route('admin.roles.update', $rol->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <x-general.form-grid :columns="1">
                        <x-general.form-group label="Nombre del rol" name="name" :value="old('name', $rol->name)"
                            placeholder="Ingrese el nombre del rol..." :required="true" :error="$errors->first('name')" />
                        <x-general.form-group label="Descripción del rol" name="description" :value="old('description', $rol->description)"
                            placeholder="Ingrese la descripción del rol..." :required="true" :error="$errors->first('description')" />
                    </x-general.form-grid>

                    <x-general.titulo-centrado titulo="Detalle de permisos" />

                    <x-picklist.picklist :items="$permissions" :asignados="$assignedPermissions" tituloDisponibles="Permisos disponibles"
                        tituloAsignados="Permisos asignados" placeholderDisponibles="Buscar permisos..."
                        placeholderAsignados="Buscar permisos asignados..." inputName="permissions" />

                    <!-- Botones para guardar o cancelar -->
                    <div class="flex justify-end mt-4 space-x-2">
                        <x-botones.cancelar :action="route('admin.roles.index')" />
                        <x-botones.crear>Actualizar Rol</x-botones.crear>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
