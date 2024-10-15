@extends('adminlte::page')


@section('content_header')
    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Creacion de roles</h3>
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
            <div class="flow-root max-w-md">
                <form action="{{ url('/admin/roles/create') }}" method="post">
                    @csrf
                    <div class="grid gap-1 mb-3 md:grid-cols-1">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                del rol</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ingrese el nombre..." required />
                            @if ($errors->has('name'))
                                <!-- Alerta de error usando Flowbite -->
                                <div class="mt-2 p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                    role="alert">
                                    <span class="font-medium">{{ $errors->first('name') }}</span>
                                </div>
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
