<?php

namespace App\Http\Livewire;

use App\Models\Capacitacion;
use App\Models\Persona;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class CapacitacionForm extends Component
{
    public Capacitacion $capacitacion;
    public Collection $personas;

    protected $listeners = ['recordChanged' => 'refreshRecord'];

    protected $rules = [
        'capacitacion.descripcion' => 'required|string|min:3',
        'capacitacion.nivel' => 'required',
        'capacitacion.desde' => 'required|date|before:hasta',
        'capacitacion.hasta' => 'nullable|date|after:desde',
        'capacitacion.institucion' => 'required|string',
    ];

    public function mount()
    {
        $this->personas = Persona::orderBy("created_at")->get();
    }
    
    public function save()
    {
        if (is_null($this->capacitacion->nivel)) {
            $this->capacitacion->nivel = "grado";
        }
        if (is_null($this->capacitacion->persona_id)) {
            $this->capacitacion->persona_id = $this->personas->first()->id;
        }
        $this->validate();

        if ($this->capacitacion->save()) {
            $this->emit("recordSaved");
        } else {
        }
    }

    public function refreshRecord($id)
    {
        if ($id == -1) {
            $this->capacitacion = new Capacitacion();
        } else {
            $this->capacitacion = Capacitacion::find($id);
        }
    }

    public function cancel()
    {
        $this->emit("closeForm");
    }

    public function render()
    {
        return view('livewire.capacitacion-form');
    }
}
