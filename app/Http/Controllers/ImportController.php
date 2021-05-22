<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\Safyc;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use DB;
use Storage;
use File;
use Illuminate\Support\Facades\Input;
use App\Deuda;
use Illuminate\Database\Eloquent\Collection;

//use App\Errores;

class ImportController extends Controller
{
    private $path = 'import';

    public function probando()
    {
    }

    public function notaCredito()
    {
        $deuda = Deuda::whereNotNull('nota_credito')
            ->orderBy('nota_credito', 'DESC')
            ->first();

        return $deuda;
    }

    public function createSafyc()
    {
        return view($this->path . '.create');
    }

    public function createDeuda()
    {
        return view($this->path . '.create');
    }

    private $agregados = 0;
    private $pre_existentes = 0;
    private $anulados = 0;
    private $revertidos = 0;
    private $no_entregados = 0;
    private $beneficiario_alts = 0;
    private $repetidos = 0;

    private $resumen;
    private $objetos = 4;

    private $finalizados;
    private $err;

    public function importSafyc()
    {
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->get() as $excel) {
                if (
                    $excel->corrent != null &&
                    $excel->no_entrada != null &&
                    $excel->id_pago != null &&
                    $excel->fec_generado != null
                ) {
                    if (
                        Safyc::where('jurisdiccion_id', $excel->corrent)
                            ->where('nro_ent', $excel->no_entrada)
                            ->where('pago_id', $excel->id_pago)
                            ->where('fec_generado', $excel->fec_generado)
                            ->count() == 0
                    ) {
                        $safyc = new Safyc();
                        $safyc->jurisdiccion_id = $excel->corrent;
                        $safyc->nro_ent = $excel->no_entrada;
                        $safyc->pago_id = $excel->id_pago;
                        $safyc->fec_generado = $excel->fec_generado;
                        $safyc->entregado = $excel->entregado;
                        $safyc->fec_entregado = $excel->fec_entregado;
                        $safyc->anulado = $excel->anulado;
                        $safyc->revertido = $excel->revertido;
                        $safyc->nro_expediente = $excel->nro_expediente;
                        $safyc->beneficiario = $excel->beneficiario;
                        $safyc->beneficiario_alt = $excel->beneficiario_alt;

                        $float_monto = str_replace(' ', '', $excel->monto);

                        $safyc->monto = str_replace('$', '', $float_monto);

                        //OBTENGO LA DEUDA CORRESPONDE EL PAGO POR SU NRO_EXP

                        $deuda = Deuda::where(
                            'periodo',
                            substr($excel->nro_expediente, 0, 6)
                        )
                            ->where('jurisdiccion_id', $excel->corrent)
                            ->first();

                        if ($deuda != null) {
                            //ASIGNO LA DEUDA SI ES QUE SE PUEDE POR EL NUMERO DE EXPEDIENTE
                            $safyc->deuda_id = $deuda->id;

                            $var_deuda = DB::table('deudas')
                                ->leftJoin(
                                    'safyc',
                                    'deudas.id',
                                    '=',
                                    'safyc.deuda_id'
                                )
                                ->select(
                                    DB::raw(
                                        'deudas.id, ifnull(nota_credito, 0) as nota_credito, max(total) as total, (sum(ifnull(monto, 0)) + ' .
                                            $safyc->monto .
                                            ') as monto'
                                    )
                                )
                                ->where('deudas.id', $deuda->id)
                                ->groupBy(
                                    'deudas.id',
                                    'periodo',
                                    'total',
                                    'nota_credito'
                                )
                                ->limit(1)
                                ->get();

                            if (
                                bcdiv($var_deuda[0]->monto, 1, 0) >=
                                bcdiv($var_deuda[0]->total, 1, 0)
                            ) {
                                //OBTENGO EL NUMERO DE NOTA DE CREDITO MAS ALTO Y LA FECHA DEL MISMO
                                $nota_credito = DB::table('deudas')
                                    ->select(
                                        DB::raw('id, CASE
                                                            WHEN nota_credito < 300 THEN 300
                                                            WHEN nota_credito is null THEN 300
                                                            ELSE nota_credito
                                                        END as nota_credito, updated_at')
                                    )
                                    ->orderBy('updated_at', 'desc')
                                    ->limit(1)
                                    ->get();

                                // VERIFICO SI EL MES CORRIENTE ES IGUAL AL MES DEL ULTIMO PAGO PARA LAS NOTAS DE CREDITO
                                if (
                                    substr(now(), 0, 7) ==
                                    substr($nota_credito[0]->updated_at, 0, 7)
                                ) {
                                    $nota_credito[0]->nota_credito =
                                        $nota_credito[0]->nota_credito + 1;
                                } else {
                                    $nota_credito[0]->nota_credito = 300;
                                }
                                $deuda->nota_credito =
                                    $nota_credito[0]->nota_credito;

                                $this->finalizados =
                                    $this->finalizados .
                                    ' Num. Ent: ' .
                                    $excel->no_entrada .
                                    ' y id pago ' .
                                    $excel->id_pago .
                                    ' <u><b>se asigno nota de credito num: ' .
                                    $deuda->nota_credito .
                                    '</b></u><br>';

                                $deuda->save();
                            }
                        }

                        $safyc->save();
                        $this->agregados += 1;

                        if ($safyc->anulado == 'S') {
                            $this->anulados += 1;
                        } elseif ($safyc->entregado == 'N') {
                            $this->no_entregados += 1;
                        } elseif ($safyc->revertido == 'S') {
                            $this->revertidos += 1;
                        } elseif (
                            $safyc->beneficiario_alt != null &&
                            $safyc->beneficiario_alt != $safyc->beneficiario
                        ) {
                            $this->beneficiario_alts += 1;
                        }
                    } else {
                        $this->resumen =
                            $this->resumen .
                            ' Num. Ent: ' .
                            $excel->no_entrada .
                            ' y id pago ' .
                            $excel->id_pago .
                            '<br>';

                        $this->repetidos += 1;
                    }
                }
            }
        });

        \Session::flash(
            'success',
            '<b>Se cargaron exitosamente: ' .
                $this->agregados .
                ' De los cuales los siguientes finalizaron su deuda: </b> <br> ' .
                $this->finalizados .
                ' <br><br> <b>Se hayaron: </b><br>' .
                ' - Anulados: ' .
                $this->anulados .
                '<br> - No entregados: ' .
                $this->no_entregados .
                '<br> - Revertidos: ' .
                $this->revertidos .
                '<br> - Beneficiario alternativo no coincide: ' .
                $this->beneficiario_alts .
                '<br><br><b>Se ignoraron: ' .
                $this->repetidos .
                ' Repetidos: </b> <br> ' .
                $this->resumen
        );

        return back();
    }

    public function importDeuda()
    {
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->get() as $excel) {
                if (
                    $excel->periodo != null &&
                    $excel->total != null &&
                    $excel->corrent != null
                ) {
                    if (
                        Deuda::where('jurisdiccion_id', $excel->corrent)
                            ->where('periodo', $excel->periodo)
                            ->where(
                                'total',
                                str_replace(',', '.', $excel->total)
                            )
                            ->count() == 0
                    ) {
                        Deuda::create([
                            'periodo' => $excel->periodo,
                            'total' => str_replace(',', '.', $excel->total),
                            'jurisdiccion_id' => $excel->corrent,
                        ]);

                        $this->agregados += 1;
                    } else {
                        $this->repetidos += 1;
                    }
                }
            }
        });

        \Session::flash(
            'success',
            '<b>Se cargaron exitosamente: ' .
                $this->agregados .
                ' deudas y se <b>ignoraron: ' .
                $this->repetidos .
                ' repetidas </b> <br> '
        );

        return back();
    }
}
