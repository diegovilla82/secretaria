<?php

namespace App\Http\Livewire\Admin\Destino;

use App\Comision;
use App\Destino;
use Livewire\Component;


class ListDestino extends Component
{
    public $resolucion, $externo;

    protected $listeners = ['newDestinonModal' => 'render'];

    public function subtract_destino($id)
    {
        $entidad = Destino::find($id);
        $entidad->delete();

        // $this->emit('subtract_agente');
    }
    
    public function mount(Comision $comision)
    {
        $this->resolucion = $comision->resolucion;
    }
    
    public function render()
    {
        $com = Comision::find(577);
//        dd($com->resolucion->destinos);
        // dd($this->resolucion->destinos[0]->destino()[0]->nombre);
        return view('livewire.admin.destino.list-destino', [
            'destinos' => $com->resolucion->destinos
        ]);
    }
}
