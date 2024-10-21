@extends('adminlte::page')

@section('content_header')
    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Creación de Roles</h3>
    <hr>
@stop

@section('content')

    @if ($errors->any())
        <div class="mt-2 p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mx-auto w-full">
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-l font-bold leading-none text-gray-900 dark:text-white">Ingrese los datos del rol</h5>
            </div>
            <hr>
            <div class="flow-root">
                <form action="{{ route('admin.roles.store') }}" method="post">
                    @csrf
                    <div class="grid gap-1 mb-3 md:grid-cols-1">
                        <!-- Nombre del rol -->
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                del rol</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ingrese el nombre del rol..." required />
                            @if ($errors->has('name'))
                                <!-- Alerta de error -->
                                <div class="mt-2 p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                    role="alert">
                                    <span class="font-medium">{{ $errors->first('name') }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Descripción del rol -->
                        <div>
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción
                                del rol</label>
                            <input id="description" name="description" type="text" value="{{ old('description') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ingrese la descripción del rol..." required />
                            @if ($errors->has('description'))
                                <!-- Alerta de error -->
                                <div class="mt-2 p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                    role="alert">
                                    <span class="font-medium">{{ $errors->first('description') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Picklist para gestionar permisos con búsqueda -->
                    <div class="mt-6 py-6">
                        <div class="bg-gray-100 text-gray-700 font-medium p-2 text-center rounded-t-md py-2">
                            Detalle de permisos
                        </div>

                        <!-- Ajuste para pantallas pequeñas -->
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 py-4">
                            <!-- Lista de permisos disponibles con búsqueda -->
                            <div class="w-full">
                                <h3 class="text-sm font-medium text-gray-700 mb-2">Permisos disponibles</h3>
                                <input type="text" id="search-available" placeholder="Buscar permisos..."
                                    class="mb-2 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-red-500 focus:outline-none focus:ring-red-500 dark:bg-gray-700 dark:text-gray-300 sm:text-sm">

                                <ul id="available-permissions"
                                    class="border border-gray-300 rounded p-2 h-48 overflow-y-auto w-full">
                                    @foreach ($permissions as $permission)
                                        <li class="p-2 hover:bg-gray-100 cursor-pointer"
                                            data-permission-id="{{ $permission->id }}"
                                            data-permission-name="{{ $permission->name }}">
                                            {{ $permission->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Controles para agregar y quitar permisos -->
                            <div class="flex flex-col justify-center space-y-2">
                                <button id="add-all-permissions" type="button"
                                    class="bg-blue text-white p-1 w-min rounded-full shadow hover:bg-blue-600 flex items-center justify-center">
                                    <x-heroicon-o-chevron-double-right class="h-4 w-4" />
                                </button>
                                <button id="add-permission" type="button"
                                    class="bg-blue text-white p-1 w-min rounded-full shadow hover:bg-blue-600 flex items-center justify-center">
                                    <x-heroicon-o-chevron-right class="h-4 w-4" />
                                </button>
                                <button id="remove-permission" type="button"
                                    class="bg-blue text-white p-1 w-min rounded-full shadow hover:bg-blue-600 flex items-center justify-center">
                                    <x-heroicon-o-chevron-left class="h-4 w-4" />
                                </button>
                                <button id="remove-all-permissions" type="button"
                                    class="bg-blue text-white p-1 w-min rounded-full shadow hover:bg-blue-600 flex items-center justify-center">
                                    <x-heroicon-o-chevron-double-left class="h-4 w-4" />
                                </button>
                            </div>

                            <!-- Lista de permisos asignados con búsqueda -->
                            <div class="w-full">
                                <h3 class="text-sm font-medium text-gray-700 mb-2">Permisos asignados</h3>
                                <input type="text" id="search-assigned" placeholder="Buscar permisos..."
                                    class="mb-2 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-red-500 focus:outline-none focus:ring-red-500 dark:bg-gray-700 dark:text-gray-300 sm:text-sm">

                                <ul id="assigned-permissions"
                                    class="border border-gray-300 rounded p-2 h-48 overflow-y-auto w-full">
                                    <!-- Esta lista se rellenará con los permisos asignados -->
                                </ul>
                            </div>
                        </div>

                        <!-- Input hidden para almacenar permisos asignados -->
                        <input type="hidden" name="permissions" id="permissions-input" value="">
                    </div>

                    <!-- Botones para guardar o cancelar -->
                    <div class="flex justify-end">
                        <a href="{{ route('admin.roles.index') }}"
                            class="rounded-lg border bg-gray-700 px-3 py-1 text-sm font-medium text-white focus:z-10 focus:outline-none focus:ring-4">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-3 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Crear Rol
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const availablePermissions = document.querySelector('#available-permissions');
            const assignedPermissions = document.querySelector('#assigned-permissions');
            const permissionsInput = document.querySelector('#permissions-input');
            const addPermissionButton = document.querySelector('#add-permission');
            const removePermissionButton = document.querySelector('#remove-permission');
            const addAllPermissionsButton = document.querySelector('#add-all-permissions');
            const removeAllPermissionsButton = document.querySelector('#remove-all-permissions');

            // Función para mover un permiso seleccionado de una lista a otra
            function movePermission(fromList, toList) {
                const selectedPermission = fromList.querySelector('.selected');
                if (selectedPermission) {
                    toList.appendChild(selectedPermission);
                    selectedPermission.classList.remove('selected', 'bg-gray-200', 'font-bold');
                    updatePermissionsInput();
                }
            }

            // Función para mover todos los permisos de una lista a otra
            function moveAllPermissions(fromList, toList) {
                const permissions = Array.from(fromList.querySelectorAll('li'));
                permissions.forEach(permission => {
                    toList.appendChild(permission);
                });
                updatePermissionsInput();
            }

            // Actualizar el campo oculto con los IDs de los permisos asignados
            function updatePermissionsInput() {
                const permissionIds = Array.from(assignedPermissions.querySelectorAll('li'))
                    .map(li => li.getAttribute('data-permission-id'));
                permissionsInput.value = permissionIds.join(',');
            }

            // Filtrar los permisos según el texto ingresado en el input de búsqueda
            function filterPermissions(searchInput, list) {
                const filter = searchInput.value.toLowerCase();
                Array.from(list.querySelectorAll('li')).forEach(permission => {
                    const permissionName = permission.getAttribute('data-permission-name').toLowerCase();
                    if (permissionName.includes(filter)) {
                        permission.style.display = '';
                    } else {
                        permission.style.display = 'none';
                    }
                });
            }

            // Eventos para mover permisos individuales
            addPermissionButton.addEventListener('click', (event) => {
                event.preventDefault();
                movePermission(availablePermissions, assignedPermissions);
            });

            removePermissionButton.addEventListener('click', (event) => {
                event.preventDefault();
                movePermission(assignedPermissions, availablePermissions);
            });

            // Eventos para mover todos los permisos
            addAllPermissionsButton.addEventListener('click', (event) => {
                event.preventDefault();
                moveAllPermissions(availablePermissions, assignedPermissions);
            });

            removeAllPermissionsButton.addEventListener('click', (event) => {
                event.preventDefault();
                moveAllPermissions(assignedPermissions, availablePermissions);
            });

            // Selección de permiso en las listas
            availablePermissions.addEventListener('click', (e) => {
                if (e.target.tagName === 'LI') {
                    clearSelection(availablePermissions);
                    e.target.classList.add('selected', 'bg-gray-200', 'font-bold');
                }
            });

            assignedPermissions.addEventListener('click', (e) => {
                if (e.target.tagName === 'LI') {
                    clearSelection(assignedPermissions);
                    e.target.classList.add('selected', 'bg-gray-200', 'font-bold');
                }
            });

            // Función para limpiar la selección en una lista
            function clearSelection(list) {
                Array.from(list.children).forEach(item => {
                    item.classList.remove('selected', 'bg-gray-200', 'font-bold');
                });
            }

            // Búsqueda en la lista de permisos disponibles
            const searchAvailable = document.querySelector('#search-available');
            searchAvailable.addEventListener('input', () => {
                filterPermissions(searchAvailable, availablePermissions);
            });

            // Búsqueda en la lista de permisos asignados
            const searchAssigned = document.querySelector('#search-assigned');
            searchAssigned.addEventListener('input', () => {
                filterPermissions(searchAssigned, assignedPermissions);
            });
        });
    </script>
@stop
