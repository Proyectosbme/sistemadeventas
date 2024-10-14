<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;

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
    Route::prefix('admin/configuracion')->controller(EmpresaController::class)->group(function () {
        Route::get('/', 'edit')->name('admin.configuracion.edit');
        Route::get('/pais/{id_pais}', 'buscar_estado')->name('admin.empresas.create.buscar_estado');
        Route::get('/estado/{id_estado}', 'buscar_ciudad')->name('admin.empresas.create.buscar_ciudad');
        Route::put('/{id}', 'update')->name('admin.configuracion.update');
    });

    /*Roles*/
    Route::prefix('admin/roles')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('admin.roles.index');
        Route::get('/create', 'create')->name('admin.roles.create');
        Route::post('/create', 'store')->name('admin.roles.store');
        Route::get('/{id}', 'show')->name('admin.roles.show');
        Route::get('/{id}/edit', 'edit')->name('admin.roles.edit');
        Route::put('/{id}', 'update')->name('admin.roles.update');
        Route::delete('/{id}', 'destroy')->name('admin.roles.destroy');

    });

    /*Usuarios*/
    Route::prefix('admin/usuarios')->controller(UsuarioController::class)->group(function () {
        Route::get('/', 'index')->name('admin.usuarios.index');
        Route::get('/create', 'create')->name('admin.usuarios.create');
        Route::post('/create', 'store')->name('admin.usuarios.store');
        Route::get('/{id}', 'show')->name('admin.usuarios.show');
        Route::get('/{id}/edit', 'edit')->name('admin.usuarios.edit');
        Route::put('/{id}', 'update')->name('admin.usuarios.update');
        Route::delete('/{id}', 'destroy')->name('admin.usuarios.destroy');

    });


});


