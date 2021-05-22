<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resolucion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'fecha' => $this->fecha,
            'numero' => $this->numero,
            'act_exp' => $this->act_exp,
            'tipo' => [
                'id' => $this->tipo_resolucion->id,
                'nombre' => $this->tipo_resolucion->nombre,
            ],
            'created_at' => $this->created_ad,
        ];
    }
}
