<?php

namespace App\Http\Livewire\Admin\Agentes;

use Livewire\Component;
use App\Agente;
use App\Comision;
use DB;

class AddAgenteComision extends Component
{
    public $comision,
        $iteration,
        $agente_id,
        $isDriver = 0;

    public function save_add_agente()
    {

        $agente = Agente::find($this->agente_id);

        $comision_especial = $this->comision->montoComisionPresidenteVocal([$this->agente_id]);

        $monto = $this->comision->externo && $comision_especial > 0 ?
                                 $comision_especial * $this->comision->dias * 2:
                                 $this->comision->montoComision($this->agente_id, $this->comision->dias, $this->comision->externo);

        $this->comision->agentes()->attach($this->agente_id, [
            'monto' => $monto,
            'chofer' => $this->isDriver,
            'vehiculo_pasaje' => 'Auto',
        ]);
        $this->emit('save_add_agente');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function mount(Comision $comision)
    {
        $this->comision = $comision;
    }

    public function render()
    {
        $agentes_ids = $this->comision->agentes->pluck('id');
        //dd($agentes_ids);
        $agentes = DB::table('agentes')
                     ->whereNotIn('id', $agentes_ids)
                     ->get();
        return view(
            'livewire.admin.agentes.add-agente-comision',
            compact('agentes')
        );
    }
}
