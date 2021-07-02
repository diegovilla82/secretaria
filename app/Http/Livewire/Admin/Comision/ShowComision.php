<?php

namespace App\Http\Livewire\Admin\Comision;

use App\Agente;
use Livewire\Component;
use Livewire\WithPagination;

class ShowComision extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $agente;

    public function mount(Agente $agente)
    {
        $this->agente = $agente;
    }

    public function render()
    {
        return view('livewire.admin.comision.show-comision');
    }
}
