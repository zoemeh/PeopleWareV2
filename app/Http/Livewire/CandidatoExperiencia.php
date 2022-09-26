<?php

namespace App\Http\Livewire;

use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CandidatoExperiencia extends Component
{
    public Experiencia $experiencia;
    public int $index;

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
}
