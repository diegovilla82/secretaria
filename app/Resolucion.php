<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolucion extends Model
{
    protected $table = 'resoluciones';
    protected $fillable = [
        'id',
        'fecha',
        'numero',
        'tipo_resolucion_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function comisiones()
    {
        return $this->hasMany('App\Comision');
    }

    public function tipo_resolucion()
    {
        return $this->belongsTo('App\TipoResolucion');
    }

    public function resolucion_detalle()
    {
        return $this->hasMany('App\ResolucionDetalle');
    }

    public function destinos()
    {
        return $this->hasMany('App\Destino');
    }
}
