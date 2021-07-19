<?php

namespace App\Http\Livewire\Admin\Comision;

use App\Agente;
use App\Comision;
use App\Localidad;
use App\Provincia;
use App\Resolucion;
use App\TipoResolucion;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NewComision extends Component
{
    public $comision, $resolucion, $disabled, $agentesSelected, $choferSelected, $provinciaSelected, $localidadesSelected;
    public $exp1, $exp2, $exp3, $exp4, $exp5, $externo, $targets;
    

    protected $rules = [
        'comision.externo'         => '',
        'comision.motivo'          => '',
        'agentesSelected'          => '',
        'localidadesSelected'      => '',
        'provinciaSelected'        => '',
        'choferSelected'           => '',
        'comision.marca_modelo'    => '',
        'comision.patente'         => '',
        'comision.combustible'     => '',
        'comision.dias'            => '',
        'comision.fecha_salida'    => '',
        'externo'                  => '',

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
    }
    public function test() {
        $this->validate();

        $this->resolucion->tipo_resolucion_id = 13;
        $this->resolucion->user_id = Auth::user()->id;
        $this->resolucion->save();

        $this->comision->resolucion_id = $this->resolucion->id;

        $this->comision->destinos = $this->comision->externo
                ? json_encode($this->localidadesSelected)
                : json_encode($this->localidadesSelected);
        $this->comision->act_exp = $this->exp1 . '-' . $this->exp2 . '-' . $this->exp3 . '-' . $this->exp4 . '-' . $this->exp5;
        $this->comision->save();

        // VIAJE AUTO CHOFER
        if ($this->choferSelected) {
            $this->comision->agentes()->attach($this->choferSelected, [
                'chofer' => '1',
                'monto' => $this->comision->montoComision(
                    $this->choferSelected,
                    $this->comision->dias,
                    $this->comision->externo
                ),
                'vehiculo_pasaje' => 'Moto',
            ]);
        }

        if ($this->agentesSelected) {
            // SI ES EXTERNO Y VIAJA UN VOCAL/PRESIDENTE SACO EL MONTO DE SU VIATICO PARA TODOS SINO SE RESPETA EL MONTO DEPENDIENDO DEL CARGO Y VIAJE
            $comision_especial = $this->comision->montoComisionPresidenteVocal(
                $this->agentesSelected
            );


            foreach ($this->agentesSelected as $p) {
                $monto =
                    $this->comision->externo && $comision_especial > 0
                        ? $comision_especial * $this->comision->dias * 2
                        : $this->comision->montoComision(
                            $p,
                            $this->comision->dias,
                            $this->comision->externo
                        );
                $this->comision->agentes()->attach($p, [
                    'monto' => $monto,
                    'vehiculo_pasaje' => 'Moto1',
                ]);
            }
        }
        
      dd($this->comision);
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
