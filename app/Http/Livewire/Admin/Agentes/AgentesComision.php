<?php

namespace App\Http\Livewire\Admin\Agentes;

use Livewire\Component;
use App\Comision;

class AgentesComision extends Component
{
    public $comision;

    protected $listeners = [
        'save_add_agente' => 'refreshMe',
        'subtract_agente' => 'refreshMe',
    ];

    public function mount(Comision $comision)
    {
        $this->comision = $comision;
    }
    public function subtract_agente($agente_id)
    {
        # code...

        $this->comision->agentes()->detach($agente_id);

        $this->emit('subtract_agente');
    }
    public function refreshMe()
    {
    }

    public function render()
    {
        $agentes = $this->comision->agentes;

        return view(
            'livewire.admin.agentes.agentes-comision',
            compact('agentes')
        );
    }
}
