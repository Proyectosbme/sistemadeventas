@extends('adminlte::page')



@section('content_header')
    <h1>Configuraciones/Editar</h1>
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
                    <form action="{{ url('create-empresa/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" id="file" name="logo" accept=".jpg,.jpeg,.png"
                                        class="form-control " required>
                                    @error('logo')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <center>
                                        <output id="list">
                                            <img src="{{ asset('storage/' . $empresa->logo) }}" width="80%" alt="logo">
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
                                            <label for="pais">Pais</label>
                                            <select name="pais" id="select_pais" class="form-control">
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
                                            <label for="departamento">Estado/Provincia/Region</label>
                                            <select name="departamento" id="select_departamento" class="form-control">
                                                @foreach ($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}" >{{ $departamento->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="respuesta_pais">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad</label>
                                            <div id="respuesta_estado">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre_empresa">Nombre de la empresa</label>
                                            <input type="text" name="nombre_empresa"
                                                value="{{ $empresa->nombre_empresa }}" class="form-control" required>
                                            @error('nombre_empresa')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_empresa">Tipo de empresa</label>
                                            <input type="text" value="{{ $empresa->tipo_empresa }}" name="tipo_empresa"
                                                class="form-control" required>
                                            @error('tipo_empresa')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nit">NIT</label>
                                            <input type="text" value="{{ $empresa->nit }}" name="nit"
                                                class="form-control" required>
                                            @error('nit')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="moneda">Moneda</label>
                                            <select name="moneda" id="" class="form-control">
                                                @foreach ($monedas as $moneda)
                                                    <option value="{{ $moneda->symbol }}">
                                                        {{ $moneda->name . ' ' . $moneda->symbol }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre_impuesto">Nombre del impuesto</label>
                                            <input type="text" value="{{ $empresa->nombre_impuesto }}"
                                                name="nombre_impuesto" class="form-control" required>
                                            @error('nombre_impuesto')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="cantidad_impuesto">Impuesto</label>
                                            <input type="number" value="{{ $empresa->cantidad_impuesto }}"
                                                name="cantidad_impuesto" class="form-control" required
                                                placeholder="Cantidad">
                                            @error('cantidad_impuesto')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telefono">Telefonos de la empresa</label>
                                            <input type="text" value="{{ $empresa->telefono }}" name="telefono"
                                                class="form-control" required>
                                            @error('telefono')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="correo">Correo de la empresa</label>
                                            <input type="email" value="{{ $empresa->correo }}" name="correo"
                                                class="form-control" required>
                                            @error('correo')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input id="pac-input" class="form-control" name="direccion" type="text"
                                                value="{{ $empresa->direccion }}" placeholder="Buscar..." required>

                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="codigo_postal">Codigo postal</label>
                                            <select name="codigo_postal" id="" class="form-control">
                                                @foreach ($paises as $paise)
                                                    <option value="{{ $paise->phone_code }}">{{ $paise->phone_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md- 4">
                                        <button type="submit" class="btn btn-lg btn-success btn-block">Actualizar
                                            datos</button>
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

@stop
