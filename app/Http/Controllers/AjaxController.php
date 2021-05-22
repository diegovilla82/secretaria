<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Comision;
use App\Resolucion;
use App\Agente;
use App\Http\Resources\ComisionResourse;

class AjaxController extends Controller
{
    private $path = 'comisiones';

    public function gastos(Request $request)
    {
        $fecha_desde = \Carbon\Carbon::parse('01-01-2019');
        $fecha_hasta = \Carbon\Carbon::parse('01-01-2020');
        $comision_gastos = Comision::find('20')
            ->agentes()
            ->simplePaginate(1000);

        return view(
            $this->path . '.otros_gastos',
            compact('comision_gastos')
        )->with('success', 'La resolucion se cargo correctamente!');
    }

    public function indexAjax(Request $request)
    {
        $fecha_desde = Carbon::parse($request->fecha_desde);
        $fecha_hasta = Carbon::parse($request->fecha_hasta);
        // return Comision::whereBetween('fecha_salida', [
        //     $fecha_desde,
        //     $fecha_hasta,
        // ])->get();
        // return ComisionResourse::collection(
        //     Comision::whereBetween('fecha_salida', [
        //         $fecha_desde,
        //         $fecha_hasta,
        //     ])->get()
        // );
        //return $fecha_hasta;
        //return $fecha_desde;
        //$fecha_desde = \Carbon\Carbon::parse('01-01-2019');
        //$fecha_hasta = \Carbon\Carbon::parse('01-01-2020');

        //        $fecha_desde = \Carbon\Carbon::parse("01-01-2019");
        //        $fecha_hasta = \Carbon\Carbon::parse("01-01-2020");

        //  $lista = DB::table('comisiones')
        //     ->join('resoluciones', 'resoluciones.id', '=', 'comisiones.resolucion_id')
        //     ->join('tipo_resolucion', 'tipo_resolucion.id', '=', 'resoluciones.tipo_resolucion_id')
        //     ->join('agente_comision', 'comisiones.id', '=', 'agente_comision.comision_id')
        //     ->join('agentes', 'agentes.id', '=', 'agente_comision.agente_id')
        //     ->join('cargos', 'cargos.id', '=', 'agentes.cargo_id')
        //     ->select( DB::raw("resoluciones.numero, agentes.id as agente_id, agentes.nombre, agentes.cuit, cargos.nombre as cargo, SUM(agente_comision.monto) as viatico, sum(comisiones.dias) as cantidad, count(agente_comision.monto) as cantidad_veces") )
        //     ->whereBetween('fecha_salida', [$fecha_desde, $fecha_hasta])
        //     ->groupBy('agentes.id')
        //     ->simplePaginate(1000);

        $lista = DB::table('comisiones')
            ->join(
                'resoluciones',
                'resoluciones.id',
                '=',
                'comisiones.resolucion_id'
            )
            ->join(
                'tipo_resolucion',
                'tipo_resolucion.id',
                '=',
                'resoluciones.tipo_resolucion_id'
            )
            ->join(
                'agente_comision',
                'comisiones.id',
                '=',
                'agente_comision.comision_id'
            )
            ->join('agentes', 'agentes.id', '=', 'agente_comision.agente_id')
            ->join('cargos', 'cargos.id', '=', 'agentes.cargo_id')
            ->select(
                DB::raw(
                    'substr(act_exp, 6, 4) anio, resoluciones.numero, agentes.id as agente_id, agentes.nombre, agentes.cuit, cargos.nombre as cargo, SUM(agente_comision.monto) as viatico, sum(comisiones.dias) as cantidad, count(agente_comision.monto) as cantidad_veces'
                )
            )
            ->whereBetween('fecha_salida', [$fecha_desde, $fecha_hasta])
            ->groupBy('anio', 'agentes.id')
            ->simplePaginate(10000);

        return $lista;
    }

    public function resolucionesAjax(Request $request)
    {
        //        $fecha_desde = Carbon::parse($request->fecha_desde);
        //        $fecha_hasta = Carbon::parse($request->fecha_hasta);

        $fecha_desde = \Carbon\Carbon::parse('01-01-2018');
        $fecha_hasta = \Carbon\Carbon::parse('01-01-2022');
        $input = $request->busqueda;

        $lista = DB::table('resoluciones')
            ->join(
                'tipo_resolucion',
                'tipo_resolucion.id',
                '=',
                'resoluciones.tipo_resolucion_id'
            )
            ->join(
                'resolucion_detalles',
                'resoluciones.id',
                '=',
                'resolucion_detalles.resolucion_id'
            )
            ->leftJoin(
                'agentes',
                'agentes.id',
                '=',
                'resolucion_detalles.agente'
            )
            ->leftJoin(
                'localidades',
                'localidades.id',
                '=',
                'resolucion_detalles.destino'
            )

            ->select(
                DB::raw("tipo_resolucion.nombre as tipo_resolucion,
                    COALESCE(agentes.nombre, resolucion_detalles.entidad, 'S/N') as agente_entidad
                     , resoluciones.numero as numero, act_exp
                    , COALESCE( CONCAT('<b>Agente: </b>', agentes.nombre, '<BR>') , '') as agente
                    , COALESCE( CONCAT('<b>Fecha: </b>', resoluciones.fecha, '<BR>') , '') as fecha
                    , COALESCE( CONCAT('<b>Entidad: </b>', resolucion_detalles.entidad, '<BR>') , '') as entidad
                    , COALESCE( CONCAT('<b>Obra: </b>', resolucion_detalles.obra, '<BR>') , '') as obra
                    , COALESCE( CONCAT('<b>Beneficiario: </b>', resolucion_detalles.beneficiario, '<BR>') , '') as beneficiario
                    , COALESCE( CONCAT('<b>Detalle: </b>', detalle, '<BR>') , '') as detalle
                    , COALESCE( CONCAT('<b>Localidad: </b>', localidades.nombre, '<BR>') , '') as localidad
                    , COALESCE( CONCAT('<b>Monto: </b>', resolucion_detalles.monto, '<BR>') , '') as monto
                    ")
            )

            //        ->select( DB::raw("resoluciones.numero, resoluciones.act_exp, agente, empresa, entidad, resolucion_detalles.numero,
            //        obra, beneficiario, detalle, destino, monto") )
            //        ->whereBetween('resoluciones.fecha', [$fecha_desde, $fecha_hasta])

            ->orWhere('tipo_resolucion.nombre', 'LIKE', '%' . $input . '%')
            ->orWhere('agentes.nombre', 'LIKE', '%' . $input . '%')
            ->orWhere('resolucion_detalles.entidad', 'LIKE', '%' . $input . '%')
            ->orWhere('resolucion_detalles.obra', 'LIKE', '%' . $input . '%')
            ->orWhere(
                'resolucion_detalles.beneficiario',
                'LIKE',
                '%' . $input . '%'
            )
            ->orWhere('resolucion_detalles.detalle', 'LIKE', '%' . $input . '%')
            ->orWhere('localidades.nombre', 'LIKE', '%' . $input . '%')
            ->orWhere('resolucion_detalles.monto', 'LIKE', '%' . $input . '%')

            //        ->groupBy('agentes.id')
            ->simplePaginate(5000);

        return $lista;
    }

    public function detalleViaticosAjax(Request $request)
    {
        //                $fecha_desde = \Carbon\Carbon::parse("01-01-2019");
        //                $fecha_hasta = \Carbon\Carbon::parse("01-01-2020");
        //                $agente_id = 1;

        $fecha_desde = Carbon::parse($request->fecha_desde);
        $fecha_hasta = Carbon::parse($request->fecha_hasta);
        $agente_id = $request->agente_id;

        $lista = DB::table('comisiones')
            ->join(
                'resoluciones',
                'resoluciones.id',
                '=',
                'comisiones.resolucion_id'
            )
            ->join(
                'tipo_resolucion',
                'tipo_resolucion.id',
                '=',
                'resoluciones.tipo_resolucion_id'
            )
            ->join(
                'agente_comision',
                'comisiones.id',
                '=',
                'agente_comision.comision_id'
            )
            ->join('agentes', 'agentes.id', '=', 'agente_comision.agente_id')
            ->join('cargos', 'cargos.id', '=', 'agentes.cargo_id')
            ->select(
                DB::raw(
                    'fecha_salida, resoluciones.numero, act_exp, comisiones.dias, externo, destinos, agente_comision.monto, comision_id, agente_id as agentes'
                )
            )
            //        ->select( DB::raw("resoluciones.numero, agentes.id as personal_id, agentes.nombre, agentes.cuit, cargos.nombre as cargo, SUM(agente_comision.monto) as viatico, sum(comisiones.dias) as cantidad, count(agente_comision.monto) as cantidad_veces") )
            ->whereBetween('fecha_salida', [$fecha_desde, $fecha_hasta])
            ->where('agentes.id', '=', $agente_id)
            ->groupBy('resoluciones.id')
            ->simplePaginate(1000);

        foreach ($lista as $l) {
            $l->destinos = Comision::destinos($l->destinos, $l->externo);
            $l->agentes = Comision::listarAgentes($l->comision_id);
            //            $l->chofer = Comision::chofer($l->comision_id);
        }

        return $lista;
    }

    public function comisionConfirmacion(Request $request)
    {
        $now = Carbon::now();

        $myArray = explode(',', $request->empleados);

        $comision = new Comision();

        $comision->montoComisionPresidenteVocal($myArray);

        $resolucion_existente = DB::table('resoluciones')
            ->select(DB::raw('count(*) cantidad'))
            ->where(
                'numero',
                str_pad($request->resolucion, 4, '0', STR_PAD_LEFT)
            )
            ->where(\DB::raw('substr(created_at, 1, 4)'), '=', $now->year)
            ->groupBy('resoluciones.id')
            ->first();

        $res_ex = empty($resolucion_existente)
            ? 0
            : $resolucion_existente->cantidad;

        if (
            $comision->montoComisionPresidenteVocal($myArray) > 0 &&
            $request->externo == 2
        ) {
            $lista = DB::table('agentes')
                ->join('cargos', 'cargos.id', '=', 'agentes.cargo_id')
                ->select(
                    DB::raw(
                        $res_ex .
                            " as resolucion_existente, CONCAT(agentes.nombre, CONCAT(': $', (" .
                            $comision->montoComisionPresidenteVocal($myArray) .
                            ' * ' .
                            $request->dias * $request->externo .
                            ") ) )AS empleados, 'si' as presi "
                    )
                )
                ->whereIn('agentes.id', $myArray)
                ->get();

            return $lista;
        } else {
            $lista = DB::table('agentes')
                ->join('cargos', 'cargos.id', '=', 'agentes.cargo_id')
                ->select(
                    DB::raw(
                        $res_ex .
                            " as resolucion_existente,  CONCAT(agentes.nombre, CONCAT(': $', (cargos.monto * " .
                            $request->dias * $request->externo .
                            ") ) )AS empleados, 'no' as presi"
                    )
                )
                ->whereIn('agentes.id', $myArray)
                ->get();

            return $lista;
        }
    }

    public function listarTiposDeResoluciones(Request $request)
    {
        $lista = DB::table('tipo_resolucion')
            ->select(
                DB::raw(
                    'id, nombre as text, agente, anio, beneficiario, dias, entidad, exp_act, obra, monto, numero, programa, localidad'
                )
            )
            ->orderBy('text')
            ->get();

        return $lista;
    }
}
