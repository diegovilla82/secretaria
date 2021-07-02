<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comision extends Model
{
    protected $table = 'comisiones';

    public function agentes()
    {
        //        return $this->belongsToMany('App\Agente', 'agente_comision', '', 'agente_id');
        return $this->belongsToMany('App\Agente', 'agente_comision')->withPivot(
            'gastos',
            'id'
        );
    }

    public function gastos()
    {
        return $this->hasMany('App\Gasto');
    }

    public function resolucion()
    {
        return $this->belongsTo('App\Resolucion');
    }

    public function montoComision($id, $dias, $externo)
    {
        $agente = Agente::find($id);
        $monto_comision = $dias * $agente->cargo->monto;
        $monto_comision = $externo ? $monto_comision * 2 : $monto_comision;

        /*        if($externo)
        {
            $monto_comision = $monto_comision * 2;
        }
*/

        return $monto_comision;
    }

    public function montoComisionPresidenteVocal($agentes_ids)
    {
        // EXTERNO TENIENDO EN CUENTA CARGO
        //        $agentes_id = str_replace(array( '[', ']', '"'), '', $request->agente);
        $monto = 0;

        $agente = DB::table('agentes')
            ->join('cargos', 'cargos.id', '=', 'agentes.cargo_id')
            ->select(DB::raw('MAX(cargos.monto) as monto, cargos.nombre'))
            ->whereIn('agentes.id', $agentes_ids)
            ->whereIn('cargos.id', [11, 29])
            ->groupBy('agentes.id')
            ->first();

        return empty($agente) ? 0 : $agente->monto;
    }

    public function getDestinos(): ? string
    {
        return $this->getAttribute('destinos');
    }

    public function getExterno(): ?bool
    {
        return $this->getAttribute('externo');
    }

    public function getDias(): ?int
    {
        return $this->getAttribute('dias');
    }

    public function destinosLW()
    {
        $ids = self::getDestinos();
        $externo = self::getExterno();

        $destinos = '';
        $pre_ids = str_replace(['[', ']', '"'], '', $ids);
        $destinos_id = explode(',', $pre_ids);

        if ($externo == 1) {
            $lista = DB::table('provincias')
                ->select(DB::raw('nombre'))
                ->where('id', '=', $destinos_id)
                ->get();
        } else {
            $lista = DB::table('localidades')
                ->select(DB::raw('nombre'))
                ->whereIn('id', $destinos_id)
                ->get();
        }

        foreach ($lista as $l) {
            $destinos = $destinos . ', ' . $l->nombre;
        }

        return substr($destinos, 2);
    }

    public function montoComisionLW($id)
    {
        $dias = self::getDias();
        $externo = self::getExterno();

        $agente = Agente::find($id);
        $monto_comision = $dias * $agente->cargo->monto;
        $monto_comision = $externo ? $monto_comision * 2 : $monto_comision;

        return $monto_comision;
    }

    public static function destinos($ids, $externo)
    {
        $destinos = '';
        $pre_ids = str_replace(['[', ']', '"'], '', $ids);
        $destinos_id = explode(',', $pre_ids);

        if ($externo == 1) {
            $lista = DB::table('provincias')
                ->select(DB::raw('nombre'))
                ->where('id', '=', $destinos_id)
                ->get();
        } else {
            $lista = DB::table('localidades')
                ->select(DB::raw('nombre'))
                ->whereIn('id', $destinos_id)
                ->get();
        }

        foreach ($lista as $l) {
            $destinos = $destinos . ', ' . $l->nombre;
        }

        return substr($destinos, 2);
    }

    public static function listarAgentes($comision_id)
    {
        $agentes = '';

        $lista = DB::table('agente_comision')
            ->join('agentes', 'agentes.id', '=', 'agente_comision.agente_id')
            ->select(
                DB::raw('
            CASE
            WHEN chofer = 1 THEN CONCAT(nombre, "(CHOFER)")
            ELSE nombre
            END as nombre')
            )
            ->where('comision_id', '=', $comision_id)
            ->get();

        foreach ($lista as $l) {
            $agentes = $agentes . ', ' . $l->nombre;
        }

        return substr($agentes, 2);
    }

    public static function chofer($comision_id)
    {
        $lista = DB::table('agente_comision')
            ->join('agentes', 'agentes.id', '=', 'agente_comision.agente_id')
            ->select(DB::raw('nombre'))
            ->where('comision_id', '=', $comision_id)
            ->where('chofer', '=', 1)
            //  ->where('comision_id', '=', $comision_id )
            ->first();

        return empty($lista) ? '-' : $lista->nombre;
        //$lista[0];
    }
}
