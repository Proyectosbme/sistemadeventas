@extends('adminlte::page')


@section('content_header')
    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Edición de roles</h3>
    <hr>
@stop

@section('content')

    <div class="row mx-auto">
        <div
            class="w-full col-span-4 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-l font-bold leading-none text-gray-900 dark:text-white">Modifique los datos</h5>
            </div>
            <hr>
            <div class="flow-root max-w-md">
                <form  action="{{ url('/admin/roles',$rol->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-1 mb-3 md:grid-cols-1">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                del rol</label>
                            <input id="name" name="name" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               value="{{ $rol->name }}" required />
                        </div>
                    </div>
                    <button type="submit"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white  bg-blue-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                            <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                          </svg>
                        Modificar
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
