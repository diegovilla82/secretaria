<?php

namespace App\Http\Livewire\Admin\Agentes;

use Livewire\Component;

class NewAgente extends Component
{
    public $disabled;
    public function render()
    {
        return view('livewire.admin.agentes.new-agente');
    }
}