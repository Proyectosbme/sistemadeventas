@extends('adminlte::page')

@section('content_header')
    <x-general.titulo-con-hr titulo="Datos de usuario {{ $usuario->name }}" />
@stop

@section('content')

    <div class="row mx-auto">
        <div
            class="w-full col-span-4 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <x-general.titulo-con-hr titulo="Modifique los datos" />
            <div class="flow-root w-full">
                <form action="{{ url('/admin/usuarios', $usuario->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <x-general.form-grid :columns="3">
                        <x-general.form-group-select label="Rol" name="role" :options="$roles->pluck('name')" :selected="$usuario->roles->pluck('name')->toArray()"
                            placeholder="Selecciona un rol" :required="true" :error="$errors->first('role')" />

                        <x-general.form-group label="Nombre del usuario" name="name" :value="$usuario->name"
                            placeholder="Ingrese el nombre..." :required="true" :error="$errors->first('name')" />

                        <x-general.form-group label="Correo" type="email" name="email" :value="$usuario->email"
                            placeholder="correo@dominio.com" :required="true" :error="$errors->first('email')" />

                        <x-general.form-group label="Password" type="password" name="password" placeholder="•••"
                            :error="$errors->first('password')" />

                        <x-general.form-group label="Confirmar Password" type="password" name="password_confirmation"
                            placeholder="•••" :error="$errors->first('password_confirmation')" />
                    </x-general.form-grid>

                    <div class="flex justify-end mt-4 space-x-2">
                        <x-botones.crear>Registrar</x-botones.crear>
                        <x-botones.cancelar :action="route('admin.usuarios.index')" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
