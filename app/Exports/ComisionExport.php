<?php

namespace App\Exports;

use App\Comision;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class ComisionExport implements FromView, WithTitle
{
    protected $id;
    
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('exports.comision', [
            'comision' => Comision::find($this->id)
        ]);
    }

    public function title(): string
    {
        return 'Month ' ;
    }
}
