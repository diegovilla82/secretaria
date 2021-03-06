<?php

namespace App\Http\Livewire\Admin\Destino;

use App\Comision;
use App\Destino;
use Livewire\Component;


class ListDestino extends Component
{
    public $resolucion, $externo, $comision;

    protected $listeners = ['newDestinonModal' => 'render'];

    public function subtract_destino($id)
    {
        $entidad = Destino::find($id);
        $entidad->delete();
    }
    
    public function mount(Comision $comision)
    {
        $this->comision = $comision;
    }
    
    public function render()
    {
        $destinos = Destino::where('resolucion_id', $this->comision->resolucion->id)->get();
        return view('livewire.admin.destino.list-destino', [
            'destinos' => $destinos
        ]);
    }
}
