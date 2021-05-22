<?php

namespace App;

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

    public function comisiones()
    {
        return $this->belongsToMany(
            'App\Comision',
            'agente_comision'
        )->withPivot('gastos');
    }

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }
}
