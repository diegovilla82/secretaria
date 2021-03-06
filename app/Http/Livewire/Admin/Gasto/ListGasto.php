<?php

namespace App\Http\Livewire\Admin\Gasto;

use App\Comision;
use App\Gasto;
use Livewire\Component;

class ListGasto extends Component
{
    public $comision;

    protected $listeners = ['newGastoModal' => 'render'];

    public function subtract_gasto($id)
    {
        $entidad = Gasto::find($id);
        $entidad->delete();
    }

    public function mount(Comision $comision)
    {
        $this->comision = $comision;

    }
    
    public function render()
    {
        $gastos = Gasto::where('comision_id', $this->comision->id)->paginate(10);

        return view('livewire.admin.gasto.list-gasto', [
            'gastos' => $gastos
        ]);
    }
}
