<?php

namespace App\Http\Traits;

trait toast {
  public  function toast($title, $icon = 'success', $timer = 3500){
    $this->dispatchBrowserEvent('swal', [
        'title' => $title,
        'timer'=> $timer,
        'icon'=> $icon,
        'toast'=>true,
        'position'=>'top-right',
        'showConfirmButton' =>  false,
    ]);
  }
}