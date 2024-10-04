@extends('adminlte::page')



@section('content_header')
    <a class="flex items-start space-x-3 rtl:space-x-reverse">

        <span class="self-start text-2xl font-semibold whitespace-nowrap dark:text-white">Configuraciones/Editar</span>
    </a>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{-- Card Box --}}
            <div class="card card-outline card-success" style="box-shadow: 5px 5px 5px 5px #cccccc " class="">

                <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none">
                        <b> Datos registrados</b>
                    </h3>
                </div>

                {{-- Card Body --}}
                <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                    <form action="{{ url('/admin/configuracion', $empresa->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="logo">Logo</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        type="file" id="file" name="logo" accept=".jpg,.jpeg,.png">
                                    @error('logo')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <center>
                                        <output id="list">
                                            <img src="{{ asset('storage/' . $empresa->logo) }}" width="80%"
                                                alt="logo">
                                        </output>
                                    </center>
                                    <script>
                                        function archivo(evt) {
                                            var files = evt.target.files;

                                            for (var i = 0, f; f = files[i]; i++) {
                                                if (!f.type.match('image.*')) {
                                                    continue;
                                                }

                                                var reader = new FileReader();
                                                reader.onload = (function(theFile) {
                                                    return function(e) {
                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e
                                                            .target.result, '"width="70%" title"', escape(theFile.name), '"/>'
                                                        ].join('');
                                                    };
                                                })(f);
                                                reader.readAsDataURL(f);
                                            }
                                        }
                                        document.getElementById('file').addEventListener('change', archivo, false);
                                    </script>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pais"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pais</label>
                                            <select name="pais" id="select_pais"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach ($paises as $paise)
                                                    <option value="{{ $paise->id }}"
                                                        {{ $empresa->pais == $paise->id ? 'selected' : '' }}>
                                                        {{ $paise->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="departamento"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado/Provincia/Region</label>
                                            <select name="departamento" id="select_departamento2"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach ($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}"
                                                        {{ $empresa->padepartamentos == $departamento->id ? 'selected' : '' }}>
                                                        {{ $departamento->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="respuesta_pais">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ciudad"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ciudad</label>
                                            <select name="ciudad" id="select_ciudad2"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach ($ciudades as $ciudade)
                                                    <option value="{{ $ciudade->id }}"
                                                        {{ $empresa->ciudad == $ciudade->id ? 'selected' : '' }}>
                                                        {{ $ciudade->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="respuesta_estado">

                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div>
                                                <label for="nombre_empresa"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                                    de la empresa</label>
                                                <input type="text" name="nombre_empresa"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ $empresa->nombre_empresa }}" required />
                                            </div>
                                            @error('nombre_empresa')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_empresa"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                                                empresa</label>
                                            <input type="text" value="{{ $empresa->tipo_empresa }}" name="tipo_empresa"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required />
                                            @error('tipo_empresa')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nit"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIT</label>
                                            <input type="text" value="{{ $empresa->nit }}" name="nit"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required />
                                            @error('nit')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="moneda"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Moneda</label>
                                            <select name="moneda" id=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach ($monedas as $moneda)
                                                    <option value="{{ $moneda->id }}"
                                                        {{ $empresa->moneda == $moneda->id ? 'selected' : '' }}>
                                                        {{ $moneda->name . ' ' . $moneda->symbol }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre_impuesto"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                                del impuesto</label>
                                            <input type="text" value="{{ $empresa->nombre_impuesto }}"
                                                name="nombre_impuesto"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required />
                                            @error('nombre_impuesto')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="cantidad_impuesto"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Impuesto</label>
                                            <input type="number" value="{{ $empresa->cantidad_impuesto }}"
                                                name="cantidad_impuesto"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required />
                                            @error('cantidad_impuesto')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telefono"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefonos
                                                de la empresa</label>
                                            <input type="text" value="{{ $empresa->telefono }}" name="telefono"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required />
                                            @error('telefono')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="correo"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                                                de la empresa</label>
                                            <input type="email" value="{{ $empresa->correo }}" name="correo"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required />
                                            @error('correo')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="direccion"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                                            <input id="pac-input" name="direccion" type="text"
                                                value="{{ $empresa->direccion }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required />
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="codigo_postal"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo
                                                postal</label>
                                            <select name="codigo_postal" id=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach ($paises as $paise)
                                                    <option value="{{ $paise->phone_code }}"
                                                        {{ $empresa->codigo_postal == $paise->phone_code ? 'selected' : '' }}>
                                                        {{ $paise->phone_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md- 4">
                                        <!-- Modal toggle -->
                                        <button type="button" data-modal-target="validacion_crear"
                                            data-modal-toggle="validacion_crear"
                                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white  bg-green-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd"
                                                    d="M13.836 2.477a.75.75 0 0 1 .75.75v3.182a.75.75 0 0 1-.75.75h-3.182a.75.75 0 0 1 0-1.5h1.37l-.84-.841a4.5 4.5 0 0 0-7.08.932.75.75 0 0 1-1.3-.75 6 6 0 0 1 9.44-1.242l.842.84V3.227a.75.75 0 0 1 .75-.75Zm-.911 7.5A.75.75 0 0 1 13.199 11a6 6 0 0 1-9.44 1.241l-.84-.84v1.371a.75.75 0 0 1-1.5 0V9.591a.75.75 0 0 1 .75-.75H5.35a.75.75 0 0 1 0 1.5H3.98l.841.841a4.5 4.5 0 0 0 7.08-.932.75.75 0 0 1 1.025-.273Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Actualizar datos
                                        </button>
                                    </div>
                                </div>




                                <!-- Main modal -->
                                <div id="validacion_crear" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Seguro de guardar cambios
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="validacion_crear">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    Esta seguro de realizar los cambios.
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white  bg-green-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                        fill="currentColor" class="size-4">
                                                        <path fill-rule="evenodd"
                                                            d="M13.836 2.477a.75.75 0 0 1 .75.75v3.182a.75.75 0 0 1-.75.75h-3.182a.75.75 0 0 1 0-1.5h1.37l-.84-.841a4.5 4.5 0 0 0-7.08.932.75.75 0 0 1-1.3-.75 6 6 0 0 1 9.44-1.242l.842.84V3.227a.75.75 0 0 1 .75-.75Zm-.911 7.5A.75.75 0 0 1 13.199 11a6 6 0 0 1-9.44 1.241l-.84-.84v1.371a.75.75 0 0 1-1.5 0V9.591a.75.75 0 0 1 .75-.75H5.35a.75.75 0 0 1 0 1.5H3.98l.841.841a4.5 4.5 0 0 0 7.08-.932.75.75 0 0 1 1.025-.273Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Actualizar
                                                </button>

                                                <button data-modal-hide="validacion_crear" type="button"
                                                    class="ml-2 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white  bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                        fill="currentColor" class="size-4">
                                                        <path
                                                            d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                                    </svg>
                                                    Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </form>
                </div>

                {{-- Card Footer --}}
                @hasSection('auth_footer')
                    <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                        @yield('auth_footer')
                    </div>
                @endif

            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $('#select_pais').on('change', function() {
            var id_pais = $('#select_pais').val();
            if (id_pais) {
                $.ajax({
                    url: "{{ url('/admin/configuracion/pais/') }}" + '/' + id_pais,
                    type: "GET",
                    success: function(data) {
                        $('#select_departamento2').css('display', 'none');
                        $('#select_ciudad2').css('display', 'none');
                        $('#respuesta_pais').html(data);
                        $('#respuesta_estado').html(null);
                    }
                });
            } else {
                alert('Selccione un pais');
            }
        });
    </script>

    <script>
        $(document).on('change', '#select_estado', function() {
            var id_estado = $(this).val();
            if (id_estado) {
                $.ajax({
                    url: "{{ url('/admin/configuracion/estado/') }}" + '/' + id_estado,
                    type: "GET",
                    success: function(data) {
                        $('#select_ciudad2').css('display', 'none');
                        $('#respuesta_estado').html(data);
                    }
                });
            } else {
                alert('Selccione un estado');
            }

        });
    </script>

@stop
