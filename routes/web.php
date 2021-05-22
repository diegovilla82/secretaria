<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/comisiones', 'ComisionController@index');
    Route::get('/comisiones/create', 'ComisionController@create');
    Route::post('/comisiones', 'ComisionController@store')->name(
        'comision.store'
    );
    Route::get('comision_confirmacion', 'AjaxController@comisionConfirmacion');
    Route::get('/resoluciones', 'ResolucionController@index');

    Route::get('detalle_resoluciones', 'AjaxController@resolucionesAjax');
    Route::resource('agente', 'AgenteController');

    Route::get('agente_comision', 'AjaxController@agenteComision');

    Route::get(
        'listar_tipos_de_resoluciones',
        'AjaxController@listarTiposDeResoluciones'
    );

    Route::get('index_ajax', 'AjaxController@indexAjax');
    Route::get('detalle_ajax', 'AjaxController@detalleViaticosAjax');

    Route::get('comision_confirmacion', 'AjaxController@comisionConfirmacion');

    Route::get('/users', 'UserController@index');
});
