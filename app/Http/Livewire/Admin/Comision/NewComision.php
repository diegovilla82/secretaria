<?php

namespace App\Http\Livewire\Admin\Comision;

use App\Agente;
use App\Comision;
use App\Localidad;
use App\Provincia;
use Carbon\Carbon;
use App\Resolucion;
use App\TipoResolucion;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NewComision extends Component
{
    public $comision, $resolucion, $disabled, $isEdit = 0, $error = '';
    public $exp1, $exp2, $exp3, $exp4, $exp5, $targets;
    

    protected $rules = [
        'comision.externo'         => '',
        'comision.motivo'          => 'required',
        'comision.marca_modelo'    => '',
        'comision.patente'         => '',
        'comision.dias'            => 'required',
        'comision.fecha_salida'    => '',

        'resolucion.numero'        => '',
        'resolucion.fecha'         => '',
        'resolucion.tipo_resolucion_id'       => '',

    ];

    public function mount() {
        $this->targets = [
            '_self' => 'En la misma ventana',
            '_blank' => 'En una ventana nueva',
        ];

        $this->comision = new Comision();
        $this->resolucion = new Resolucion();
        $this->exp1 = 'E';
        $this->exp5 = 'A';

        $fecha = Carbon::now();
        $this->comision->fecha_salida = $fecha->toDateString();
        $this->resolucion->fecha = $fecha->toDateString();
        $this->resolucion->user_id = Auth()->user()->id;
        
        
        $ultimaResolucion = Resolucion::latest('id')->first();
        if( isset($ultimaResolucion->numero)) {
            $this->resolucion->numero = $ultimaResolucion->numero + 1;
            $this->resolucion->fecha = $ultimaResolucion->fecha;
        } else {
            $this->resolucion->numero = 1;
        }
        
    }

    public function test() {
        $this->validate();
        $this->resolucion->tipo_resolucion_id = 13;
        $this->resolucion->user_id = Auth::user()->id;
        $this->resolucion->save();

        $this->comision->resolucion_id = $this->resolucion->id;

        $this->comision->act_exp = $this->exp1 . '-' . $this->exp2 . '-' . $this->exp3 . '-' . $this->exp4 . '-' . $this->exp5;
        $this->comision->save();

        return redirect()->route('comisiones_lw.edit', $this->comision->id);
    }
    public function render()
    {
        return view('livewire.admin.comision.new-comision',[
            'destinos' => TipoResolucion::orderBy('nombre')->pluck('nombre','id'),
            'agentes' => Agente::orderBy('nombre')->pluck('nombre','id'),
            'chofer' => Agente::orderBy('nombre')->pluck('nombre','id'),
            'localidades' => Localidad::orderBy('nombre')->pluck('nombre','id'),
            'provincias' => Provincia::orderBy('nombre')->pluck('nombre','id')
        ]);
    }
}
