<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoResolucion extends Model
{
    protected $table = 'tipo_resolucion';

    public $timestamps = false;

    public function resolucion()
    {
        return $this->hasMany('App\Resolucion');
    }
}
