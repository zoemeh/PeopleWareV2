<?php

namespace App\Http\Livewire;

use App\Models\Capacitacion;
use Livewire\Component;

class CandidatoCapacitacion extends Component
{
    public Capacitacion $capacitacion;
    public int $index;
    public function render()
    {
        return view('livewire.candidato-capacitacion');
    }

    public function eliminar()
    {
        $this->emit("eliminarCapacitacion", $this->index);
    }
}
