<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas se cargan a través del RouteServiceProvider y todas se asignarán
| al grupo de middleware "web". ¡Haz algo genial!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-empresa',[App\Http\Controllers\EmpresaController::class,'create'])->name('admin.empresas.create');
Route::get('/create-empresa/pais/{id_pais}',[App\Http\Controllers\EmpresaController::class,'buscar_estado'])->name('admin.empresas.create.buscar_estado');
Route::get('/create-empresa/estado/{id_estado}',[App\Http\Controllers\EmpresaController::class,'buscar_ciudad'])->name('admin.empresas.create.buscar_ciudad');

