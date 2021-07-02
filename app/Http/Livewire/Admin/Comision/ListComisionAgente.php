<?php

namespace App\Http\Livewire\Admin\Comision;

use App\Agente;
use Livewire\Component;
use Livewire\WithPagination;


class ListComisionAgente extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $lista = Agente::orderBy('nombre')->paginate(10);
        return view('livewire.admin.comision.list-comision-agente', [
            'agentes' => $lista
        ]);
    }
}
