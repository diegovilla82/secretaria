<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use PDF;
use Config;
use App\Deuda;
use Carbon\Carbon;

class ReporteController extends Controller
{
    private $path = 'reports';

    public function test()
    {
        $nota_credito = 299;

        return $nota_credito + 1;

        $probando = '232 322.33';
        $probando = str_replace(' ', '', $probando);
        return $probando;

        $date = now();
        $date = $date->addMonths(1);

        return $date;
    }

    public function dashboard()
    {
        /*
    $probando = Auth::user()->probandoRoles('admin');

    return back()
    ->with('success','HOLA' );
*/

        /*
    $reporte = DB::table('deudas')
    ->select(DB::raw('count(1) as safyc'))
    ->where('jurisdiccion_id', '<', '90')
    ->get();
*/
        //        return $reporte;

        $legal = DB::table('deudas')
            ->select(DB::raw('count(id) as total_deudas, sum( ifnull'))
            //        ->where('deudas.jurisdiccion_id = jurisdicciones.id')
            ->where('total > 0')
            //        ->where('periodo', '01/2017')
            //        ->orderBy('safyc.deuda_id', 'asc')
            ->simplePaginate(1000);

        return view($this->path . '.dashboard');

        $sql = DB::table('deudas')
            ->select(
                DB::raw(
                    'id, ifnull(nota_credito, 300) as nota_credito, updated_at'
                )
            )

            ->orderBy('updated_at', 'desc')
            ->limit(1)
            ->get();
    }

    //Indice de Datos y deudas
    public function ajax_import1()
    {
        // DETALLE DE AGRUPACION PERIODO Y JURISDICCION
        $legal = DB::table('safyc')
            ->join('deudas', 'deudas.id', '=', 'safyc.deuda_id')
            ->leftJoin(
                'jurisdicciones',
                'jurisdicciones.id',
                '=',
                'safyc.jurisdiccion_id'
            )
            ->select(DB::raw('nombre as jurisdiccion, periodo'))
            //        ->where('deudas.jurisdiccion_id = jurisdicciones.id')
            ->where('nombre', 'INSTITUTO DE COLONIZACION')
            ->where('periodo', '01/2017')
            //        ->orderBy('safyc.deuda_id', 'asc')
            ->simplePaginate(1000);

        $legal = DB::table('safyc')
            ->leftJoin(
                'jurisdicciones',
                'jurisdicciones.id',
                '=',
                'safyc.jurisdiccion_id'
            )
            ->leftJoin('deudas', 'deudas.id', '=', 'safyc.deuda_id')
            ->select(
                DB::raw(
                    'jurisdicciones.nombre, nro_ent, id_pago, fec_generado, nro_expediente, ifnull(deudas.periodo, "COCOCOCOCO") as periodo , beneficiario, monto'
                )
            )
            ->orderBy('safyc.deuda_id', 'asc')
            ->simplePaginate(1000);

        return $legal;
    }

    public function reporte_periodo()
    {
        //DEUDA POR PERIODO Y JURISDICCION CON DETALLE DE CANTIDAD
        $legal = DB::table('safyc')
            ->join('deudas', 'deudas.id', '=', 'safyc.deuda_id')
            ->leftJoin(
                'jurisdicciones',
                'jurisdicciones.id',
                '=',
                'safyc.jurisdiccion_id'
            )
            ->select(
                DB::raw(
                    'nombre as jurisdiccion, periodo, count(*) as cant_pagos, total, (total - sum(monto)) as pendiente, sum(monto) as pagado'
                )
            )
            ->where('periodo = 01/2017')
            ->groupBy('nombre', 'periodo', 'total')
            //        ->orderBy('safyc.deuda_id', 'asc')
            ->simplePaginate(1000);

        return $legal;
    }

    public function reporteNotas($_periodo)
    {
        /*

select concat(jurisdiccion_id, " - ", jurisdicciones.nombre) as jurisdiccion, nota_credito, fec_generado, nro_expediente, ultimo.periodo, beneficiario, monto, ultimo.total,

ultimo.safyc_id, ultimo.total, ultimo.periodo, ultimo.deuda, jurisdiccion_id, ultimo.created_at

FROM (
    select max(safyc.id) as safyc_id, total, periodo, nota_credito, deudas.id as deuda, safyc.created_at
    FROM deudas
    INNER JOIN safyc on safyc.deuda_id = deudas.id
    WHERE nota_credito is not null and nota_credito not in (1, 0)
    group by deuda_id
    order by deuda_id desc, safyc.id desc
) as ultimo INNER JOIN safyc ON ultimo.safyc_id = safyc.id
INNER JOIN jurisdicciones ON safyc.jurisdiccion_id = jurisdicciones.id
order by jurisdiccion_id

*/
    }

    public function reporteAnio($_anio)
    {
        $anio = $_anio;

        $sub_query = '';
        $mes = '';
        $from = '';
        for ($i = 12; $i > 0; $i--) {
            $mes = $i < 10 ? '0' . $i : '' . $i;

            if ($i == 1) {
                $from = ' m1 left join ';
            } elseif ($i == 12) {
                $from =
                    ' m' .
                    $i .
                    ' on m1.jurisdiccion_id = m' .
                    $i .
                    '.jurisdiccion_id and m1.es_total = m' .
                    $i .
                    '.es_total';
            } else {
                $from =
                    ' m' .
                    $i .
                    ' on m1.jurisdiccion_id = m' .
                    $i .
                    '.jurisdiccion_id and m1.es_total = m' .
                    $i .
                    '.es_total left join ';
            }
            //        $from = ($i==1)?  : ' m' . $i . ' on m1.id_jur = m' . $i . '.id_jur inner join';

            $sub_query =
                ' (
            select deudas.jurisdiccion_id, periodo,
            max(coalesce(total, 0) ) AS m' .
                $i .
                ',
            1 as es_total,

CASE
WHEN round( sum(coalesce(monto, 0) ), 2 ) = max(coalesce(total, 0) ) THEN 0
WHEN round( sum(coalesce(monto, 0) ), 2 ) > max(coalesce(total, 0) ) THEN 2
ELSE 1
END as color_m' .
                $i .
                '


            from deudas left join safyc  on deudas.id = safyc.deuda_id
            where periodo = ' .
                $anio .
                $mes .
                '
            group by deudas.jurisdiccion_id, periodo


            union


            select deudas.jurisdiccion_id, periodo,
            round( sum(coalesce(monto, 0) ), 2 )  AS m' .
                $i .
                ',
            0 as es_total,
CASE
WHEN round( sum(coalesce(monto, 0) ), 2 ) = max(coalesce(total, 0) ) THEN 0
WHEN round( sum(coalesce(monto, 0) ), 2 ) > max(coalesce(total, 0) ) THEN 2
ELSE 1
END as color_m' .
                $i .
                '
            from deudas left join safyc  on deudas.id = safyc.deuda_id
            where periodo = ' .
                $anio .
                $mes .
                '
            group by deudas.jurisdiccion_id, periodo )
            ' .
                $from .
                $sub_query;
        }
        //       $sub_query = 'select m1.jurisdiccion_id, m1.ES_TOTAL, m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12, sum(m1 + m2 + m3 + m4 + m5 + m6 + m7 + m8 + m9 + m10 + m11 + m12) as total from ' . $sub_query . ' group by jurisdiccion_id, es_total';

        //       $sub_query = '(' . $sub_query . ''

        $consulta = DB::table(DB::raw($sub_query))
            ->leftJoin(
                'jurisdicciones',
                'jurisdicciones.id',
                '=',
                'm1.jurisdiccion_id'
            )
            ->select(
                DB::raw(
                    ' concat ( m1.jurisdiccion_id, " - ", nombre ) as jurisdiccion, m1.jurisdiccion_id, m1.ES_TOTAL, m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12, round(sum(m1 + m2 + m3 + m4 + m5 + m6 + m7 + m8 + m9 + m10 + m11 + m12), 2 ) as total, ' .
                        $anio .
                        ' as anio, color_m1, color_m2, color_m3, color_m4, color_m5, color_m6, color_m7, color_m8, color_m9, color_m10, color_m11, color_m12'
                )
            )
            ->groupBy('jurisdiccion_id', 'es_total')
            ->orderBy('jurisdiccion_id', 'asc', 'es_total', 'asc')
            ->get();

        $pdf = PDF::loadView($this->path . '.totales', ['data1' => $consulta]);
        return $pdf->stream();
    }

    public function notas_credito_select()
    {
        return view($this->path . '.notas_credito_select');
    }
    public function notas_credito($_periodo)
    {
        //        return substr($_periodo, 0, 7);

        $sub_query =
            ' (
                select max(safyc.id) as safyc_id, total, periodo, nota_credito, deudas.id as deuda, safyc.updated_at
                FROM deudas
                INNER JOIN safyc on safyc.deuda_id = deudas.id
                WHERE nota_credito is not null and nota_credito != 1
                and safyc.updated_at LIKE "' .
            substr($_periodo, 0, 7) .
            '%"
                group by deuda_id
                order by deuda_id desc, safyc.id desc
            ) as ultimo ';

        $consulta = DB::table(DB::raw($sub_query))
            ->join('safyc', 'safyc.id', '=', 'ultimo.safyc_id')
            ->join(
                'jurisdicciones',
                'jurisdicciones.id',
                '=',
                'safyc.jurisdiccion_id'
            )
            ->select(
                DB::raw(
                    ' CONCAT( jurisdicciones.id, " - ", jurisdicciones.nombre)as jurisdiccion, nro_ent, fec_generado, nro_expediente,  ultimo.periodo as fec_imputada, beneficiario, monto, total as imputacion, ultimo.nota_credito, "' .
                        $_periodo .
                        '" as titulo, jurisdicciones.id'
                )
            )
            ->orderBy('jurisdicciones.id', 'asc', 'nota_credito', 'asc')
            ->get();

        $pdf = PDF::loadView($this->path . '.notas_credito', [
            'data1' => $consulta,
        ]);
        return $pdf->stream();
    }
}
