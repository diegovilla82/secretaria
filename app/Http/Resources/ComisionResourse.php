<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComisionResourse extends JsonResource
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
            'fecha_salida' => $this->fecha_salida,
            'externo' => $this->externo,
            'dias' => $this->dias,
            'combustible' => $this->combustible,
            'act_exp' => $this->act_exp,
            'gastos' => $this->gastos,
            'agentes' => AgenteResourse::collection($this->agentes),
            'destinos' => $this->destinos,
            'resolucion' => new Resolucion($this->resolucion),
            'created_at' => $this->created_at,
        ];
    }
}
