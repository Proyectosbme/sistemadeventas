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




/*crear empresa*/
Route::prefix('create-empresa')->controller(App\Http\Controllers\EmpresaController::class)->group(function () {
    Route::get('/', 'create')->name('admin.empresas.create');
    Route::get('/pais/{id_pais}', 'buscar_estado')->name('admin.empresas.create.buscar_estado');
    Route::get('/estado/{id_estado}', 'buscar_ciudad')->name('admin.empresas.create.buscar_ciudad');
    Route::post('/create', 'store')->name('admin.empresas.create.store');
});

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::prefix('admin')->controller(App\Http\Controllers\AdminController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index');
        Route::post('/', 'store')->name('admin.empresas.create.store');
    });

    /*configuracion*/
    Route::prefix('admin/configuracion')->controller(App\Http\Controllers\EmpresaController::class)->group(function () {
        Route::get('/', 'edit')->name('admin.configuracion.edit');
        Route::get('/pais/{id_pais}', 'buscar_estado')->name('admin.empresas.create.buscar_estado');
        Route::get('/estado/{id_estado}', 'buscar_ciudad')->name('admin.empresas.create.buscar_ciudad');
        Route::put('/{id}', 'update')->name('admin.configuracion.update');
    });



});


