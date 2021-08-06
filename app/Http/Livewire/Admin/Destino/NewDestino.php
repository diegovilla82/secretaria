<?php

namespace App\Http\Livewire\Admin\Destino;

use App\Destino;
use App\Localidad;
use App\Provincia;
use App\Resolucion;
use Livewire\Component;

class NewDestino extends Component
{
    public $comision, $destino, $iteration, $resolucion, $localidadSelected, $provinciaSelected, $externo;

    protected $rules = [
        'externo'        => '',
        'localidadSelected'         => '',
        'provinciaSelected'           => '',
    ];

    public function save()
    {
        // $this->gasto->agente_id = $this->agente_id;
        // $this->gasto->comision_id = $this->comision->id;
        // $this->gasto->concepto = $this->concepto_selected;
        // $this->gasto->save();

    }
    public function mount(Resolucion $resolucion)
    {
        $this->resolucion = $resolucion;
        $this->destino = new Destino();

    }

    public function render()
    {
        $localidades = Localidad::get();
        $provincias = Provincia::get();
        return view('livewire.admin.destino.new-destino', [
            'localidades' => $localidades,
            'provincias' => $provincias
        ]);
    }
}
