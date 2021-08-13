<?php

namespace App\Http\Livewire\Admin\Agentes;

use App\Cargo;
use App\Agente;
use Livewire\Component;

class NewAgente extends Component
{
    public $disabled, $situacion_revista_selected = "Contrato de Servicio", $escalafon_selected = "General del Poder Ejecutivo", 
    $categoria_selected = "Personal Adm. y Tecnico" , $cargo_selected = 1, $agente;

    protected $rules = [
        'agente.nombre'                 => '',
        'agente.cuit'                   => '',
        'situacion_revista_selected'    => '',
        'escalafon_selected'            => '',
        'categoria_selected'            => '',
        'cargo_selected'                => '',
        'agente.apartado'               => '',
        'agente.ceic'                   => '',
        'agente.grupo'                  => '',
        'agente.numero'                 => ''
    ];

    public function mount() {
        $this->agente = new Agente();
    }
    
    public function save_agente() {
        $this->agente->situacion_revista_id = $this->situacion_revista_selected;
        $this->agente->escalafon_id = $this->escalafon_selected;
        $this->agente->categoria_id = $this->categoria_selected;
        $this->agente->cargo_id = $this->cargo_selected;
        $this->agente->save();

        return redirect()->route('comisiones_lw.index');
    }

    public function render()
    {
        $array_situacion_revista = collect( [ "Contrato de Servicio" => "Contrato de Servicio", 
            "Funcionario" => "Funcionario", "Planta Permanente" => "Planta Permanente", 
            "Personal Transitorio" => "Personal Transitorio", "Personal de Gabinete" => "Personal de Gabinete", 
            "Personal adscripto" => "Personal adscripto" 
        ]);
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
