<?php

namespace App\Http\Livewire;

use App\Models\Empleado;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EmpleadoForm extends Component
{
    public Empleado $empleado;
    public Collection $personas;

    protected $listeners = ['recordChanged' => 'refreshRecord'];


    protected $rules = [
        'empleado.persona_id' => 'required',
        'empleado.desde' => 'required|date',
        'empleado.activo' => 'nullable|boolean',
        'empleado.salario' => 'required',
    ];

    public function mount()
    {
        $this->personas = Persona::orderBy("created_at")->get();
    }


    public function save()
    {
        if (is_null($this->empleado->persona_id)) {
            $this->empleado->persona_id = $this->personas->first()->id;
        }
        $this->validate();

        if ($this->empleado->save()) {
            $this->emit("recordSaved");
        } else {
        }
    }

    public function refreshRecord($id)
    {
        if ($id == -1) {
            $this->empleado = new Empleado();
        } else {
            $this->empleado = Empleado::find($id);
        }
    }

    public function cancel()
    {
        $this->emit("closeForm");
    }

    public function render()
    {
        return view('livewire.empleado-form');
    }
}
