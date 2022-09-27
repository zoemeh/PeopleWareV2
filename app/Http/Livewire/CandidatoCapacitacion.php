<?php

namespace App\Http\Livewire;

use App\Models\Capacitacion;
use Livewire\Component;

class CandidatoCapacitacion extends Component
{
    public Capacitacion $capacitacion;
    public int $index;
    protected $listeners = ['validar' => 'validar', "saveWithPersona"];

    protected $rules = [
        'capacitacion.descripcion' => 'required|string|min:3',
        'capacitacion.nivel' => 'required',
        'capacitacion.desde' => 'required|date',
        'capacitacion.hasta' => 'nullable|date|after:desde',
        'capacitacion.institucion' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.candidato-capacitacion');
    }

    public function eliminar()
    {
        $this->emit("eliminarCapacitacion", $this->index);
    }

    public function validar()
    {
        $this->validate();
        $this->emit("replyValidarCapacitacion", true);
    }

    public function saveWithPersona($id) {
        $this->capacitacion->persona_id = $id;
        $this->capacitacion->save();
    }
}
