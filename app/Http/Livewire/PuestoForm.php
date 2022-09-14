<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Puesto;
use App\Models\Departamento;

class PuestoForm extends Component
{
    public Puesto $puesto;
    protected $listeners = ['recordChanged' => 'refreshRecord'];
    public $departamentos;
    public function render()
    {
        return view('livewire.puesto-form');
    }

    public function mount()
    {
        $this->departamentos = Departamento::orderBy("created_at")->get();
    }

    public function save()
    {
        $this->validate();

        if ($this->puesto->save()) {
            $this->emit("recordSaved");
        } else {
        }
    }

    public function refreshRecord($id)
    {
        if ($id == -1) {
            $this->puesto = new Puesto();
        } else {
            $this->puesto = Puesto::find($id);
        }
    }

    public function cancel()
    {
        $this->emit("closeForm");
    }
}
