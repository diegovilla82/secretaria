<?php

namespace App\Http\Livewire\Admin\Destino;

use App\Comision;
use App\Resolucion;
use Livewire\Component;


class ListDestino extends Component
{
    public $resolucion, $externo;

    
    public function mount(Resolucion $resolucion)
    {
        $this->resolucion = $resolucion;

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
