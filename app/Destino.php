<?php

namespace App;

use App\Localidad;
use App\Provincia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $fillable = [
        'id',
        'externo',
        'destino_id',
        'resolucion_id',
        'created_at',
        'updated_at',
    ];

    public function getExterno(): ?bool
    {
        return $this->getAttribute('externo');
    }

    public function getResolucionId(): ?int
    {
        return $this->getAttribute('resolucion_id');
    }
    
    public function getDestinoId(): ?int
    {
        return $this->getAttribute('destino_id');
    }


    public function resolucion()
    {
        return $this->belongsTo('App\Resolucion');
    }
    
    public function getDestinos()
    {
        $destinos_id = self::getDestinoId();
        $externo = self::getExterno();
            
        $destinos = [];
        if ($externo) {
           return Provincia::where('id', '=', $destinos_id)
                ->first();
        } else {
            return Localidad::where('id', $destinos_id)
                ->get();
        }
        return $destinos;
        
    }
}
