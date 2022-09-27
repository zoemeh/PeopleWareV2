<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SimpleShow extends Component
{

    public $record;
    public string $resource;

    protected $listeners = ['recordChanged' => 'refreshRecord'];


    public function render()
    {
        return view('livewire.simple-show');
    }

    public function refreshRecord($id)
    {
        if ($id == -1) {
            $this->record = new ($this->record::class);
        } else {
            $this->record = $this->record::class::find($id);
        }
    }

    public function cancel()
    {
        $this->emit("closeShow");
    }
}
