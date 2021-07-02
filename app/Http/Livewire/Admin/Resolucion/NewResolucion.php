<?php

namespace App\Http\Livewire\Admin\Resolucion;

use App\Agente;
use App\TipoResolucion;
use Livewire\Component;

class NewResolucion extends Component
{
    public $disabled;

    public function render()
    {
        $tipo = TipoResolucion::orderBy('nombre')->pluck('nombre','id');
        return view('livewire.admin.resolucion.new-resolucion', [
            'tipo_resolucion' => TipoResolucion::orderBy('nombre')->pluck('nombre','id')
        ]);
    }
}
