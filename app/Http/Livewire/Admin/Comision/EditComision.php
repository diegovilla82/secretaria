<?php

namespace App\Http\Livewire\Admin\Comision;

use App\Agente;
use App\Comision;
use App\Localidad;
use App\Provincia;
use App\TipoResolucion;
use Livewire\Component;

class EditComision extends Component
{
    public $comision,
        $disabled,
        $agentesSelected,
        $choferSelected,
        $provinciaSelected,
        $localidadesSelected,
        $isEdit = 1;
    public $exp1, $exp2, $exp3, $exp4, $exp5, $externo;

    protected $rules = [
        'comision.externo' => '',
        'comision.motivo' => '',
        'agentesSelected' => '',
        'localidadesSelected' => '',
        'provinciaSelected' => '',
        'choferSelected' => '',
        'comision.marca_modelo' => '',
        'comision.patente' => '',
        'comision.combustible' => '',
        'comision.dias' => '',
        'comision.fecha_salida' => '',
        'externo' => '',
    ];

    public function mount(Comision $comision)
    {
        $this->comision = $comision;
        $this->agentesSelected = $this->comision->agentes
            ->pluck('nombre', 'id')
            ->toArray();
        // dd($this->agentesSelected);
        // dd($this->comision->agentes->pluck('nombre','id'));
        $this->exp1 = 'E';
        $this->exp5 = 'A';
    }
    public function test()
    {
        $this->validate();
        $this->comision->destinos = $this->comision->externo
            ? json_encode($this->localidadesSelected)
            : json_encode($this->localidadesSelected);
        $this->comision->act_exp =
            $this->exp1 .
            '-' .
            $this->exp2 .
            '-' .
            $this->exp3 .
            '-' .
            $this->exp4 .
            '-' .
            $this->exp5;

        $this->comision->save();
        dd($this->comision);
    }

    public function render()
    {
        return view('livewire.admin.comision.edit-comision', [
            'destinos' => TipoResolucion::orderBy('nombre')->pluck(
                'nombre',
                'id'
            ),
            'agentes' => Agente::orderBy('nombre')->pluck('nombre', 'id'),
            'chofer' => Agente::orderBy('nombre')->pluck('nombre', 'id'),
            'localidades' => Localidad::orderBy('nombre')->pluck(
                'nombre',
                'id'
            ),
            'provincias' => Provincia::orderBy('nombre')->pluck('nombre', 'id'),
        ]);
    }
}
