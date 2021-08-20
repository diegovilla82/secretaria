<?php

namespace App\Http\Livewire\Admin\Comision;

use App\Agente;
use App\Destino;
use App\Comision;
use App\Localidad;
use App\Provincia;
use App\Resolucion;
use App\TipoResolucion;
use Livewire\Component;
use App\Http\Traits\toast;

class EditComision extends Component
{
    use toast;
    public $comision,
            $resolucion,
            $disabled,
            $isEdit = 1;
    public $exp1, $exp2, $exp3, $exp4, $exp5, $error = '';

    protected $rules = [
        'comision.externo' => '',
        'comision.motivo' => '',
        'comision.marca_modelo' => '',
        'comision.patente' => '',
        'comision.combustible' => '',
        'comision.motivo' => 'required',
        'comision.dias' => 'required',
        'comision.fecha_salida' => 'required',

        'resolucion.numero'        => '',
        'resolucion.fecha'         => 'required',
        'resolucion.tipo_resolucion_id'       => '',
    ];

    public function mount(Comision $comision)
    {
        $this->toast('Pagina Actualizada');
        $this->comision = $comision;
        $this->resolucion = $comision->resolucion;

        $act_exp = explode("-", $comision->act_exp);
        $this->exp1 = $act_exp[0];
        $this->exp2 = $act_exp[1];
        $this->exp3 = $act_exp[2];
        $this->exp4 = $act_exp[3];
        $this->exp5 = $act_exp[4];
        $this->agentesSelected = $this->comision->agentes
            ->pluck('nombre', 'id')
            ->toArray();
    }
    
    public function updateComision()
    {
        $this->error = '';

        if(count($this->comision->agentes) == 0 ) {
            $this->error = '<br> <b> Debe agregar al menos un agente </b> <br>';
        }
        if(Destino::where('resolucion_id', $this->comision->resolucion->id)->count() == 0 ) {
            $this->error = '<br> <b> Debe agregar al menos un destino </b> <br>';
        }


        $this->validate();

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
        // return redirect()->route('comisiones_lw.edit', $this->comision->id);
        
        session()->flash('success', 'La comision se modifico exitosamente!');
        return redirect()->route('comisiones_lw.edit', $this->comision->id);
       
//        dd($this->comision);
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
