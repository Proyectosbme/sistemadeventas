@extends('adminlte::page')

@section('content_header')
    <h3 class="text-xl font-bold leading-none text-gray-900 blue:text-white">Listado de roles</h3>

    <hr>
@stop

@section('content')
    <div class="card card-outline card-info" style="box-shadow: 5px 5px 5px 5px #cccccc " class="">
        <div class="row">

            <div
                class="w-full col-span-12 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <!-- Contenedor del encabezado con botón centrado -->
                <div class="flow-root w-full max-w-3xl mx-auto">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-l font-bold leading-none text-gray-900 dark:text-white">Roles registrados</h5>
                        <a href="{{ url('/admin/roles/create') }}"
                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Agregar
                        </a>
                    </div>

                    <!-- Contenedor de la tabla centrado -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto w-full max-w-3xl">
                        <table class="w-full text-sm text-center rtl:text-center text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-12 py-1">
                                        Nombre del rol
                                    </th>
                                    <th scope="col" class="px-12 py-1">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-2">
                                            {{ $rol->name }}
                                        </td>
                                        <td class="px-12 py-1 text-center">
                                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                                <a href="{{ url('/admin/roles', $rol->id) }}"
                                                    class="inline-flex items-center px-4 py-1 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="size-5">
                                                        <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <a href="{{ url('/admin/roles/' . $rol->id . '/edit') }}"
                                                    class="inline-flex items-center px-4 py-1 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-yellow-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="size-5">
                                                        <path
                                                            d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ url('/admin/roles', $rol->id) }}" method="POST"
                                                    onsubmit="preguntar(event, {{ $rol->id }})"
                                                    id="miFormulario{{ $rol->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-1 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" class="size-5">
                                                            <path fill-rule="evenodd"
                                                                d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>

                                                <script>
                                                    function preguntar(event, rolId) {
                                                        event.preventDefault(); // Corrige el error tipográfico
                                                        Swal.fire({
                                                            title: "Desea eliminar el registro?",
                                                            text: '',
                                                            icon: 'question',
                                                            confirmButtonText: 'Eliminar',
                                                            confirmButtonColor: '#a5161d',
                                                            showDenyButton: true,
                                                            denyButtonColor: 'blue',
                                                            denyButtonText: 'Cancelar'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = document.getElementById('miFormulario' + rolId);
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
