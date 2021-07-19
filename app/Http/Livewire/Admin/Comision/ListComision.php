<?php

namespace App\Http\Livewire\Admin\Comision;

use App\Comision;
use Livewire\Component;
use Livewire\WithPagination;

class ListComision extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $lista = Comision::orderByDesc('created_at')->paginate(10);
        return view('livewire.admin.comision.list-comision', [
            'comisiones' => $lista
        ]);
    }
}
