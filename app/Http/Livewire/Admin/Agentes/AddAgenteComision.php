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
        $isDriver = 0,
        $monto = 0;

        protected $rules = [
            'monto' => ''
        ];

    public function change()
    {
        try {
            $agente = Agente::find($this->agente_id);
            $this->monto = $agente->cargo->monto * $this->comision->dias;
            $this->monto = $this->monto *  (($this->comision->externo) ? 2 : 1 );
        } catch (\Throwable $th) {
            $this->monto = 0;
        }

    }

    public function save_add_agente()
    {
        $this->comision->agentes()->attach($this->agente_id, [
            'monto' => $this->monto,
            'chofer' => $this->isDriver,
            'vehiculo_pasaje' => 'Auto',
        ]);
        $this->monto = 0;
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
