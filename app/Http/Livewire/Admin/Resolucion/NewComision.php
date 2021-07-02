<?php

namespace App\Http\Livewire\Admin\Resolucion;

use App\TipoResolucion;
use Livewire\Component;

class NewComision extends Component
{
    public $disabled;

    public function render()
    {
        return view('livewire.admin.resolucion.new-comision',[
            'destinos' => TipoResolucion::orderBy('nombre')->pluck('nombre','id'),
            'localidades' => [],
            'provincias' => []
        ]);
    }
}
