<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function agentes()
    {
        return $this->hasMany('App\Agente');
    }
}
