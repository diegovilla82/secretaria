<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolucion extends Model
{
    protected $table = 'resoluciones';

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
