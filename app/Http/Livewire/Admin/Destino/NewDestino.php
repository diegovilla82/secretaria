<?php

namespace App\Http\Livewire\Admin\Destino;

use App\Destino;
use App\Comision;
use App\Localidad;
use App\Provincia;
use App\Resolucion;
use Livewire\Component;
use App\Http\Traits\toast;

class NewDestino extends Component
{
    public $comision, $destino, $iteration, $resolucion, $destinoSelected, $externo, $gasto;

    use toast;
    
    protected $listeners = ['comisionExterno'];

    public function comisionExterno($val = 0)
    {
        $this->externo = $val;
    }
    
    protected $rules = [
        'externo'        => '',
        'destinoSelected'         => 'required',
    ];

    public function save()
    {
        $valor = $this->externo == null ? 0 : $this->externo;

        $this->destino->externo = $this->externo;
        $this->destino->destino_id = $this->destinoSelected;
        $this->destino->resolucion_id = $this->resolucion->id;
        $this->destino->save();
        $this->destino = new Destino();

        $this->emit('newDestinonModal', 'Destino');
            
        


        // $this->gasto->agente_id = $this->agente_id;
        // $this->gasto->comision_id = $this->comision->id;
        // $this->gasto->concepto = $this->concepto_selected;
        // $this->gasto->save();

    }
    public function mount(Comision $comision, $externo)
    {
        $this->externo = $externo;
        $this->resolucion = $comision->resolucion;
        $this->destino = new Destino();

    }

    public function render()
    {
        // dd($this->externo);
        if($this->externo == 0) {
            $destinos = Localidad::get();
        } else {
        $destinos = Provincia::get();
        }
        return view('livewire.admin.destino.new-destino', [
            'destinos' => $destinos
        ]);
    }
}
