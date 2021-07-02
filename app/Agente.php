<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'cuit',
        'situacion_revista_id',
        'escalafon_id',
        'categoria_id',
        'apartado',
        'cargo_id',
        'ceic',
        'grupo',
        'numero',
        'created_at',
        'updated_at',
    ];

    public function getId(): ?int
    {
        return $this->getAttribute('id');
    }

    public function montoComisiones()
    {
        $id = self::getId();

        $agente = Agente::join('agente_comision', 'agentes.id', '=', 'agente_comision.agente_id')
        ->join('comisiones', 'agente_comision.comision_id', '=', 'comisiones.id')
        ->select(DB::raw('sum(agente_comision.monto * comisiones.dias) total'))
        ->where('agentes.id', $id)
        ->groupBy('agentes.id')
        ->first()
        ;


        return $agente['total'];
        $lista = DB::table('agente')
        ->join()
            ->select(DB::raw('nombre'))
            ->where('id', '=', $destinos_id)
            ->get();

        $total = $this->comisiones->sum('pivot.gastos');
        $total += $this->comisiones->sum('pivot.monto');
        return $total;
    }

    public function diasComisiones()
    {
        return $this->comisiones->sum('dias');
    }
    public function comisiones()
    {
        return $this->belongsToMany(
            'App\Comision',
            'agente_comision'
        )->withPivot('gastos', 'monto');
    }

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }
}
