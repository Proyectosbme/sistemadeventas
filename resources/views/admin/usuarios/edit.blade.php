@extends('adminlte::page')

@section('content_header')
    <x-general.titulo-con-hr titulo="Datos de usuario {{ $usuario->name }}" />
@stop

@section('content')
    <x-contenedor :titulo="'Ingrese los datos del usuario'">
        <x-slot name="contenido">
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

                <x-botones.crear>Registrar</x-botones.crear>
                <x-botones.cancelar :action="route('admin.usuarios.index')" />

            </form>
        </x-slot>
    </x-contenedor>
@stop

@section('css')
@stop

@section('js')
@stop
