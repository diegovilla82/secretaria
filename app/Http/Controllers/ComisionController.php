<?php

namespace App\Http\Controllers;

use App\Comision;
use Illuminate\Http\Request;
use DB;
use App\Resolucion;
use App\Agente;
use App\ResolucionDetalle;
use App\DataTables\ComisionDataTable;

use Auth;
use Session;

class ComisionController extends Controller
{
    private $path = 'comisiones';

    public function storeGastos(Request $request)
    {
        $comision = Comision::find($request->comision_id)
            ->agentes()
            ->where('agente_id', '=', $request->agente_id)
            ->first();
        $comision->pivot->gastos = $request->gastos;
        $comision->pivot->save();

        $comision_gastos = Comision::find($request->comision_id)
            ->agentes()
            ->simplePaginate(1000);

        session()->flash('success', 'El gasto se asignado correctamente!');

        return view($this->path . '.otros_gastos', compact('comision_gastos'));
    }

    public function probando(Request $request)
    {
        $resolucion = DB::table('comisiones')
            ->leftJoin(
                'resoluciones',
                'resoluciones.id',
                '=',
                'comisiones.resolucion_id'
            )
            ->select('numero', 'fecha', 'fecha_salida')
            ->orderBy('resoluciones.numero', 'desc')
            ->first();

        return $resolucion->numero;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ComisionDataTable $dataTable)
    {
        //return view($this->path . '.index');
        return $dataTable->render('comision.index');
        //return view('comision.index');
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

        $cargos = DB::table('cargos')
            ->distinct()
            ->select('id', 'nombre')
            ->get();

        return view(
            'comision.create',
            compact(
                'agentes',
                'provincias',
                'localidades',
                'resolucion',
                'tipo_resolucion',
                'cargos'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resolucion = new Resolucion();
        $resolucion->fecha = \Carbon\Carbon::parse($request->fecha);
        $resolucion->numero = str_pad(
            $request->resolucion,
            4,
            '0',
            STR_PAD_LEFT
        );
        //        $resolucion->act_exp = ($request->exp4) ? $request->exp1 . '-' . $request->exp2 . '-' . $request->exp3 . '-' . $request->exp4 . '-' . $request->exp5 : 'S/N';
        $resolucion->tipo_resolucion_id = $request->tipo_resolucion;
        $resolucion->user_id = Auth::user()->id;
        $resolucion->save();

        if ($request->tipo_resolucion == 13) {
            $comision = new Comision();
            $comision->act_exp = $request->exp4
                ? $request->exp1 .
                    '-' .
                    $request->exp2 .
                    '-' .
                    $request->exp3 .
                    '-' .
                    $request->exp4 .
                    '-' .
                    $request->exp5
                : 'S/N';
            $comision->externo = $request->externo;
            $comision->fecha_salida = \Carbon\Carbon::parse(
                $request->fecha_salida
            );
            $comision->destinos = $request->externo
                ? json_encode($request->provincias)
                : json_encode($request->localidades);
            $comision->dias = $request->dias;
            $comision->combustible = $request->combustible;
            $comision->resolucion_id = $resolucion->id;
            $comision->save();

            // VIAJE AUTO CHOFER
            if (strlen($request->chofer) >= 1) {
                $comision->agentes()->attach($request->chofer, [
                    'chofer' => '1',
                    'monto' => $comision->montoComision(
                        $request->chofer,
                        $request->dias,
                        $request->externo
                    ),
                    'vehiculo_pasaje' => 'Auto',
                ]);
            }
            // VIAJE AUTO
            if (strlen($request->agente[0]) >= 1) {
                // SI ES EXTERNO Y VIAJA UN VOCAL/PRESIDENTE SACO EL MONTO DE SU VIATICO PARA TODOS SINO SE RESPETA EL MONTO DEPENDIENDO DEL CARGO Y VIAJE
                $comision_especial = $comision->montoComisionPresidenteVocal(
                    $request->agente
                );
                foreach ($request->agente as $p) {
                    $monto =
                        $request->externo && $comision_especial > 0
                            ? $comision_especial * $request->dias * 2
                            : $comision->montoComision(
                                $p,
                                $request->dias,
                                $request->externo
                            );
                    $comision->agentes()->attach($p, [
                        'monto' => $monto,
                        'vehiculo_pasaje' => 'Auto',
                    ]);
                }
            }

            // VIAJE AVION
            if (strlen($request->agente_pasaje[0]) >= 1) {
                // SI ES EXTERNO Y VIAJA UN VOCAL/PRESIDENTE SACO EL MONTO DE SU VIATICO PARA TODOS SINO SE RESPETA EL MONTO DEPENDIENDO DEL CARGO Y VIAJE
                $comision_especial = $comision->montoComisionPresidenteVocal(
                    $request->agente_pasaje
                );
                foreach ($request->agente_pasaje as $p) {
                    $monto =
                        $request->externo && $comision_especial > 0
                            ? $comision_especial * $request->dias * 2
                            : $comision->montoComision(
                                $p,
                                $request->dias,
                                $request->externo
                            );
                    $comision->agentes()->attach($p, [
                        'monto' => $monto,
                        'vehiculo_pasaje' => 'Pasaje',
                    ]);
                }
            }

            if ($request->check_gastos) {
                $comision_gastos = Comision::find($comision->id)
                    ->agentes()
                    ->simplePaginate(1000);

                session()->flash(
                    'success',
                    'La resolucion numero <i><b>' .
                        $resolucion->numero .
                        '</i></b> se cargo correctamente!'
                );

                return view(
                    $this->path . '.otros_gastos',
                    compact('comision_gastos')
                );
            }
        } else {
            $resolucion_detalle = new ResolucionDetalle();
            $resolucion_detalle->agente = $request->agente_ot;
            $resolucion_detalle->entidad = $request->entidad_ot;
            $resolucion_detalle->numero = $request->numero_ot;
            $resolucion_detalle->programa = $request->programa_ot;
            //        $resolucion_detalle->dias = $request->dias_ot;
            $resolucion_detalle->act_exp = $request->exp4_ot
                ? $request->exp1_ot .
                    '-' .
                    $request->exp2_ot .
                    '-' .
                    $request->exp3_ot .
                    '-' .
                    $request->exp4_ot .
                    '-' .
                    $request->exp5_ot
                : 'S/N';
            //        $resolucion_detalle->exp_act = $request->exp_act_ot;
            $resolucion_detalle->obra = $request->obra_ot;
            $resolucion_detalle->beneficiario = $request->beneficiario_ot;
            $resolucion_detalle->detalle = $request->detalle_ot;
            $resolucion_detalle->destino = $request->localidad_ot;
            $resolucion_detalle->monto = $request->monto_ot;
            $resolucion_detalle->resolucion_id = $resolucion->id;
            $resolucion_detalle->save();
        }

        //        return $resolucion_detalle;

        return back()->with(
            'success',
            'La resolucion numero <i><b>' .
                $resolucion->numero .
                '</i></b> se cargo correctamente!'
        );
    }
}
