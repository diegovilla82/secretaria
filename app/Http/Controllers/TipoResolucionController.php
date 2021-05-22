<?php

namespace App\Http\Controllers;

use App\TipoResolucion;
use Illuminate\Http\Request;

class TipoResolucionController extends Controller
{
    private $path = 'tipo_resolucion';

    public function index()
    {
        return view($this->path . '.index');
    }
    public function store(Request $request)
    {
        //      $comision = Comision::find($request->comision_id)->agentes()->where('agente_id', '=', $request->agente_id)->first();
        $tipo_resolucion = new TipoResolucion();
        $tipo_resolucion->nombre = $request->nombre;

        $request->agente ? 1 : 0;

        $tipo_resolucion->agente = $request->agente ? 1 : 0;
        $tipo_resolucion->anio = $request->anio ? 1 : 0;
        $tipo_resolucion->beneficiario = $request->beneficiario ? 1 : 0;
        $tipo_resolucion->dias = $request->dias ? 1 : 0;
        $tipo_resolucion->entidad = $request->entidad ? 1 : 0;
        $tipo_resolucion->exp_act = $request->exp_act ? 1 : 0;
        $tipo_resolucion->obra = $request->obra ? 1 : 0;
        $tipo_resolucion->monto = $request->monto ? 1 : 0;
        $tipo_resolucion->numero = $request->numero ? 1 : 0;
        $tipo_resolucion->programa = $request->programa ? 1 : 0;
        $tipo_resolucion->localidad = $request->localidad ? 1 : 0;
        $tipo_resolucion->save();

        $lista_select = DB::table('tipo_resolucion')
            ->select(DB::raw('id, nombre as text'))
            ->orderBy('text')
            ->get();

        $lista_full = DB::table('tipo_resolucion')
            ->select(
                DB::raw(
                    'id, nombre as text, agente, anio, beneficiario, dias, entidad, exp_act, obra, monto, numero, programa, localidad'
                )
            )
            ->orderBy('text')
            ->get();

        return \Response::json([
            'lista_full' => $lista_full,
            'lista_select' => $lista_select,
        ]);
        //        return \Response::json($lista);
    }
}
