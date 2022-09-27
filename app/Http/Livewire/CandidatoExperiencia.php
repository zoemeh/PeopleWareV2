<?php

namespace App\Http\Livewire;

use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CandidatoExperiencia extends Component
{
    public Experiencia $experiencia;
    public int $index;
    protected $listeners = ['validar' => 'validar', 'saveWithPersona' => 'saveWithPersona'];
    protected $rules = [
        'experiencia.empresa' => 'required|string|min:2',
        'experiencia.puesto' => 'required|string|min:2',
        'experiencia.desde' => 'required|date',
        'experiencia.hasta' => 'nullable|date|after:desde',
        'experiencia.salario' => 'nullable|numeric',
    ];
    public function mount()
    {
        //$this->experiencia = new Experiencia();
    }
    public function render()
    {
        return view('livewire.candidato-experiencia');
    }

    public function eliminar()
    {
        $this->emit("eliminarExperiencia", $this->index);
    }

    public function validar()
    {
        $this->validate();
        $this->emit("replyValidarExperiencia", true);
    }

    public function saveWithPersona($id)
    {
        $this->experiencia->persona_id = $id;
        $this->experiencia->save();
    }
}
