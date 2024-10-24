@extends('adminlte::page')

@section('content_header')
    <x-general.titulo :titulo="'Creación de Usuarios'" :descripcion="'Gestiona los usuarios del sistema.'" />
    <hr>
@stop

@section('content')
    <x-contenedor :titulo="'Ingrese los datos del usuario'">
        <x-slot name="contenido">
            <form action="{{ route('admin.usuarios.store') }}" method="post">
                @csrf
                <x-general.form-grid :columns="3">
                    <!-- Select de Rol -->
                    <x-general.form-group-select label="Rol" name="role" :value="old('role')" :options="$roles->pluck('name', 'name')"
                        placeholder="Selecciona un rol..." :error="$errors->first('role')" />

                        <!-- Nombre del Usuario -->
                    <x-general.form-group label="Nombre del usuario" name="name" :value="old('name')"
                        placeholder="Ingrese el nombre del usuario..." :required="true" :error="$errors->first('name')" />

                    <!-- Correo Electrónico -->
                    <x-general.form-group label="Correo" name="email" type="email" :value="old('email')"
                        placeholder="correo@dominio.com" :required="true" :error="$errors->first('email')" />

                    <!-- Password -->
                    <x-general.form-group label="Password" name="password" type="password" :value="old('password')"
                        placeholder="•••••••••" :required="true" :error="$errors->first('password')" />

                    <!-- Confirmación de Password -->
                    <x-general.form-group label="Confirmar Password" name="password_confirmation" type="password"
                        :value="old('password_confirmation')" placeholder="•••••••••" :required="true" :error="$errors->first('password_confirmation')" />
                </x-general.form-grid>

                <!-- Botones para guardar o cancelar -->
                <div class="mt-4">
                    <x-botones.cancelar :action="route('admin.usuarios.index')" />
                    <x-botones.crear>Registrar</x-botones.crear>
                </div>
            </form>
        </x-slot>
    </x-contenedor>
@stop

@section('css')
@stop

@section('js')
@stop
