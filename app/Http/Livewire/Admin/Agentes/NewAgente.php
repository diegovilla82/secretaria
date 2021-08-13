<?php

namespace App\Http\Livewire\Admin\Agentes;

use App\Cargo;
use Livewire\Component;

class NewAgente extends Component
{
    public $disabled, $situacion_revista_selected, $escalafon_selected;

    public function mount()
    {

    }
    public function render()
    {
        $array_situacion_revista = collect( ["Contrato de Servicio", "Funcionario", "Planta Permanente", "Personal Transitorio", "Personal de Gabinete", "Personal adscripto" ]);
        $array_escalafon = collect( ["General del Poder Ejecutivo", "Aut. Sup. del Poder Ejecutivo", "Otro"]);
        $array_categoria = collect( ["Personal Adm. y Tecnico", "Personal de Servicios", "Personal de Gabinete", "Personal administrativo y tecnico" ]); 
        $array_cargo = Cargo::orderBy('nombre')->pluck('nombre','id');

        return view('livewire.admin.agentes.new-agente',[
            "situaciones_revista" => $array_situacion_revista,
            "escalafones" => $array_escalafon,
            "categorias" => $array_categoria,
            "cargos" => $array_cargo 
        ]);
    }
}
