<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SimpleForm extends Component
{
    public $record;
    public $resource;

    protected $listeners = ['recordChanged' => 'refreshRecord'];


    protected $rules = [
        'record.descripcion' => 'required|string|min:3',
        'record.activo' => 'boolean',
    ];

    public function save()
    {
        // FIXME: competencias not saving when validate is active
        $this->validate();
        if ($this->record->save()) {
            $this->emit("recordSaved");
        } else {

        }
        $this->record->activo = is_null($this->record->activo) ? false : true;
    }
    
    public function render()
    {
        return view('livewire.simple-form');
    }

    public function refreshRecord($id)
    {
        if ($id == -1) {
            $this->record = new ($this->record::class);
        } else {
            $this->record = $this->record::class::find($id);
        }
    }

    public function cancel() {
        $this->emit("closeForm");
    }
}
