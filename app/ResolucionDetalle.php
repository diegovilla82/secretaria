<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResolucionDetalle extends Model
{
    public function resolucion()
    {
        return $this->belongsTo('App\Resolucion');
    }
}
