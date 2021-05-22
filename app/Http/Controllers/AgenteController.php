<?php

namespace App\Http\Controllers;

use App\Agente;
use DB;
use App\Resolucion;
use App\Comision;
use App\ResolucionDetalle;
use Illuminate\Http\Request;

class AgenteController extends Controller
{
    private $path = 'agentes';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->path . '.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comision = DB::table('comisiones')
            ->select('fecha_salida')
            ->orderBy('fecha_salida', 'desc')
            ->first();

        $resolucion = DB::table('resoluciones')
            ->select('numero', 'fecha')
            ->orderBy('numero', 'desc', 'fecha', 'desc')
            ->first();

        $agentes = DB::table('agentes')
            ->distinct()
            ->select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->simplePaginate(1000);

        $provincias = DB::table('provincias')
            ->distinct()
            ->select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->get();

        $tipo_resolucion = DB::table('tipo_resolucion')
            ->distinct()
            ->select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->get();

        $localidades = DB::table('localidades')
            ->distinct()
            ->select('id', 'nombre')
            ->get();

        return view(
            $this->path . '.create',
            compact(
                'agentes',
                'provincias',
                'localidades',
                'resolucion',
                'tipo_resolucion'
            )
        );
    }

    public function store(Request $request)
    {
        $agente = new Agente();
        $agente->nombre = $request->nombre;
        $agente->cuit = $request->cuit;
        $agente->situacion_revista_id = $request->situacion_revista_id;
        $agente->escalafon_id = $request->escalafon_id;
        $agente->categoria_id = $request->categoria_id;
        $agente->apartado = $request->apartado;
        $agente->cargo_id = $request->agente_cargo_id;
        $agente->ceic = $request->ceic;
        $agente->grupo = $request->grupo;
        $agente->numero = $request->numero;

        $agente->save();

        $lista_select = DB::table('agentes')
            ->select(DB::raw('id, nombre as text'))
            ->orderBy('text')
            ->get();

        return \Response::json(['lista_select' => $lista_select]);
        //        return \Response::json($lista);
    }
}
