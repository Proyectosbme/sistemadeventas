@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido {{ $empresa->nombre_empresa }}</b></h1>
    <hr>
@stop

@section('content')



@stop

@section('css')

@stop

@section('js')
    >
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 2500
        });
    </script>

@stop
