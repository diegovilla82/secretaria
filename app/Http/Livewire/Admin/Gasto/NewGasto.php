<?php

namespace App\Http\Livewire\Admin\Gasto;

use App\Gasto;
use App\Agente;
use App\Comision;
use Livewire\Component;

class NewGasto extends Component
{

    public $comision, $iteration, $agente_id, $comision_id, $conceptos, $concepto_selected, $gasto;

    protected $rules = [
        'gasto.concepto'        => '',
        'gasto.importe'         => '',
        'comision_id'           => '',
        'agente_id'             => '',
    ];

    public function save_gasto()
    {
        $this->gasto->agente_id = $this->agente_id;
        $this->gasto->comision_id = $this->comision->id;
        $this->gasto->concepto = $this->concepto_selected;
        $this->gasto->save();
        $this->gasto = new Gasto();

        $this->emit('newGastoModal', 'Gasto');

    }
    public function mount(Comision $comision)
    {
        $this->comision = $comision;
        $this->comision_id = $comision->id;
        $this->gasto = new Gasto();

        $this->conceptos = [
        'Anticipo para gastos' => 'Anticipo para gastos'
        ,'Pasaje Aereo' => 'Pasaje Aereo'
        ,'Pasaje colectivo' => 'Pasaje colectivo'
        ,'Vehiculo empresa' => 'Vehiculo empresa'
        ,'Vehiculo oficial' => 'Vehiculo oficial'
        ,'Vehiculo particular' => 'Vehiculo particular'
    ];

    }

    public function render()
    {
        $agentes = $this->comision->agentes();
//        dd($agentes);
        return view('livewire.admin.gasto.new-gasto', [
            'agentes' => $this->comision,
            'conceptos' => $this->conceptos
        ]);
    }
}
