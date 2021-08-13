<?php

use App\Agente;
use App\Comision;
use Illuminate\Http\Request;
use App\Exports\ComisionExport;
use Illuminate\Http\Client\Response;
use Maatwebsite\Excel\Facades\Excel;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// test
Route::view('conisiones_agente_lw', 'adminlte.comision.list')->name('conisiones_agente_lw.index');
Route::view('comision_agente_lw/{id}', 'adminlte.comision.show')->name('comision_agente_lw.show');
Route::view('comisiones_lw/{id}', 'adminlte.comision.show')->name('comisiones_lw.show');
// test

Route::view('comisiones_lw', 'adminlte.comision.list1')->name('comisiones_lw.index');
Route::view('comisiones_lw_new', 'adminlte.comision.new')->name('comisiones_lw.new');
Route::view('comisiones_lw/edit/{id}', 'adminlte.comision.edit')->name('comisiones_lw.edit');




Route::redirect('/','/comisiones_lw');



Route::get('excel/{id}', function(Request $request){ 
    return Excel::download(new ComisionExport($request->id), 'comision' . $request->id .'.xlsx');

})->name('excel');

Route::get('reporte/{id}', function(Request $request){ 
    // return $request->id;
    $comision = Comision::find($request->id);
    // dd($agente->gastosComision(577));
    // return view('reports/tabla', compact('comision'));
    // return $comision->agentes;

    $data = [
        'comision' => $comision,
        'titulo' => 'IPDUV'
    ];
    return \PDF::loadView('reports/tabla', $data)
        ->setPaper('legal')
        ->download('archivo.pdf');
})->name('reporte');

Route::get('docs-generate', function(){

    $headers = array(

        "Content-type"=>"text/html",

        "Content-Disposition"=>"attachment;Filename=myGeneratefile.docx"

    );

    

    $content = '<html>

            <head><meta charset="utf-8"></head>

            <body>

                <p>My Blog Laravel 7 generate word document from html Example - Nicesnippets.com</p>

                <ul><li>Php</li><li>Laravel</li><li>Html</li></ul>

            </body>

            </html>';

    

    return \Response::make($content,200, $headers);

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
