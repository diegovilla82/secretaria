<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\ResolucionController;
use App\Http\Livewire\Admin\Resolucion\NewResolucion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/','/comisiones');

Auth::routes();


Route::view('lw', 'adminlte.resolucion.create')->name('lw');

//Route::get('/lw', NewResolucion::class);


//Route::get('/resoluciones', ListResolucion::class)->name('resoluciones');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index']);
//    Route::get('/home', 'HomeController@index')->name('home');

    // Route::get('/comisiones', 'ComisionController@index');
    // Route::get('/comisiones/create', 'ComisionController@create');
    // Route::post('/comisiones', 'ComisionController@store')->name('comision.store');
    // Route::get('comision_confirmacion', 'AjaxController@comisionConfirmacion');
    // Route::get('/resoluciones', 'ResolucionController@index');

    Route::get('/comisiones', [ComisionController::class, 'index']);
    Route::get('/comisiones/create', [ComisionController::class, 'create']);
    Route::post('/comisiones', [ComisionController::class, 'store'])->name('comision.store');
    Route::get('comision_confirmacion', [AjaxController::class, 'comisionConfirmacion'] );
    Route::get('/resoluciones',  [ResolucionController::class, 'index']);

    // Route::get('detalle_resoluciones', 'AjaxController@resolucionesAjax');
    // Route::resource('agente', 'AgenteController');
    Route::get('detalle_resoluciones', [AjaxController::class, 'resolucionesAjax'] );

    Route::resource('agente', AgenteController::class);


    // Route::get('agente_comision', 'AjaxController@agenteComision');
    Route::get('agente_comision', [AjaxController::class, 'agenteComision'] );

    // Route::get('listar_tipos_de_resoluciones','AjaxController@listarTiposDeResoluciones');
    Route::get('listar_tipos_de_resoluciones', [AjaxController::class, 'listarTiposDeResoluciones'] );

    // Route::get('index_ajax', 'AjaxController@indexAjax');
    // Route::get('detalle_ajax', 'AjaxController@detalleViaticosAjax');
    // Route::get('comision_confirmacion', 'AjaxController@comisionConfirmacion');

    Route::get('index_ajax', [AjaxController::class, 'indexAjax'] );
    Route::get('detalle_ajax', [AjaxController::class, 'detalleViaticosAjax'] );
    Route::get('comision_confirmacion', [AjaxController::class, 'comisionConfirmacion'] );
    

//    Route::get('/users', 'UserController@index');
    Route::get('users', [UserController::class, 'index'] );
});
