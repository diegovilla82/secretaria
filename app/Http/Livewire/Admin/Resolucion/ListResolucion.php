<?php

namespace App\Http\Livewire\Admin\Resolucion;

use Livewire\Component;

class ListResolucion extends Component
{

    public function mount()
    {
        dd('component funcionando');
    }

    public function render()
    {
        return view('livewire.admin.resolucion.list-resolucion');
    }
}
