<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;

class PersonaForm extends Component
{
    public Persona $persona;
    protected $listeners = ['recordChanged' => 'refreshRecord'];
    protected $rules = [
        'persona.nombre' => 'required|string',
        'persona.cedula' => 'required|alpha_num',
    ];
    public function render()
    {
        return view('livewire.persona-form');
    }


    public function save()
    {
        $this->validate();

        if ($this->persona->save()) {
            $this->emit("recordSaved");
        } else {
        }
    }

    public function refreshRecord($id)
    {
        if ($id == -1) {
            $this->persona = new Persona();
        } else {
            $this->persona = Persona::find($id);
        }
    }

    public function cancel()
    {
        $this->emit("closeForm");
    }
}
