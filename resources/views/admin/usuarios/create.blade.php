@extends('adminlte::page')


@section('content_header')
    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Creacion de usuarios</h3>
    <hr>
@stop

@section('content')

    <div class="row mx-auto">
        <div
            class="w-full col-span-4 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-l font-bold leading-none text-gray-900 dark:text-white">Ingrese los datos</h5>
            </div>
            <hr>
            <div class="flow-root w-full">
                <form action="{{ route('admin.usuarios.store') }}" method="post">
                    @csrf
                    <div class="grid gap-6 mb-3 md:grid-cols-3">
                        <div>
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                            <select name="role" id="role"
                                class="bg-gray-50 border {{ $errors->has('role') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Selecciona un rol</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                                <span class="text-red-500 text-sm">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
                                usuario</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="bg-gray-50 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ingrese el nombre..." required />
                            @if ($errors->has('name'))
                                <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                            <input type="email" id="email" value="{{ old('email') }}" name="email"
                                class="bg-gray-50 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="correo@domionio.com" required />
                            @if ($errors->has('email'))
                                <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" name="password" value="{{ old('password') }}"
                                class="bg-gray-50 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" required />
                            @if ($errors->has('password'))
                                <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar
                                password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                value="{{ old('password_confirmation') }}"
                                class="bg-gray-50 border {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" required />
                            @if ($errors->has('password_confirmation'))
                                <span class="text-red-500 text-sm">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>

                    <button type="submit"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white  bg-blue-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        Registrar
                    </button>
                </form>

            </div>
        </div>

    </div>
@stop

@section('css')

@stop
<!-- alertas -->
@section('js')



@stop
