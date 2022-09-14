<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SimpleShow extends Component
{

    public $record;
    public string $resource;
    
    public function render()
    {
        return view('livewire.simple-show');
    }
}
