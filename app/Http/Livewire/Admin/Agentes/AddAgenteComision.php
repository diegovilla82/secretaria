<?php

namespace App\Http\Livewire\Admin\Agentes;

use Livewire\Component;
use App\Agente;
use App\Comision;

class AddAgenteComision extends Component
{
    public $comision,
        $iteration,
        $agente_id,
        $isDriver = 0;

    public function save_add_agente()
    {
        $agente = Agente::find($this->agente_id);
        $monto_comision = $this->comision->dias * $agente->cargo->monto;

        $this->comision->agentes()->attach($this->agente_id, [
            'monto' => $monto_comision,
            'chofer' => 1,
            'vehiculo_pasaje' => 'Auto',
        ]);
        $this->emit('save_add_agente');
    }

    public function mount(Comision $comision)
    {
        $this->comision = $comision;
    }

    public function render()
    {
        $agentes = Agente::all();
        return view(
            'livewire.admin.agentes.add-agente-comision',
            compact('agentes')
        );
    }
}
