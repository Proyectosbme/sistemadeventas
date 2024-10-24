<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UsuarioController;
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

/*crear empresa*/
Route::prefix('create-empresa')->controller(EmpresaController::class)->group(function () {
    Route::get('/', 'create')->name('admin.empresas.create');
    Route::get('/pais/{id_pais}', 'buscar_estado')->name('admin.empresas.create.buscar_estado');
    Route::get('/estado/{id_estado}', 'buscar_ciudad')->name('admin.empresas.create.buscar_ciudad');
    Route::post('/create', 'store')->name('admin.empresas.create.store');
});

Route::middleware('auth')->group(function () {
    /*Inicio*/
    Route::get('/home', [AdminController::class, 'index'])->name('home');

    /*Administrador*/
    Route::prefix('admin')->controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index');
        Route::post('/', 'store')->name('admin.empresas.create.store');
    });

    /*configuracion*/
    /* Configuración */
    Route::prefix('admin/configuracion')->controller(EmpresaController::class)->group(function () {
        Route::get('/', 'edit')->name('admin.configuracion.edit');
        Route::get('/pais/{id_pais}', 'buscar_estado')->name('admin.configuracion.buscar_estado');
        Route::get('/estado/{id_estado}', 'buscar_ciudad')->name('admin.configuracion.buscar_ciudad');
        Route::put('/{id}', 'update')->name('admin.configuracion.update');
    });

    /* Roles */
    Route::resource('admin/roles', RoleController::class)
    ->names('admin.roles');
    //->middleware('permission:menu-titulo-seguridad');
    /*permisos*/
    Route::resource('admin/permisos', RolePermissionController::class)->names('admin.permisos');
    /*Usuarios*/
    Route::resource('admin/usuarios', UsuarioController::class)->names('admin.usuarios');




});


