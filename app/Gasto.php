<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $fillable = [
        'id',
        'concepto',
        'importe',
        'comision_id',
        'created_at',
        'updated_at',
    ];

    public function comision()
    {
        return $this->belongsTo('App\Comision');
    }

    public function agente()
    {
        return $this->belongsTo('App\Agente');
    }
}
