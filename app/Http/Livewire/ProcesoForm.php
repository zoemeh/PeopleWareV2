<?php

namespace App\Http\Livewire;

use App\Models\Candidato;
use App\Models\Puesto;
use Livewire\Component;

class ProcesoForm extends Component
{
    public Puesto $puesto;
    public function render()
    {
        return view('livewire.proceso-form');
    }

    public function seleccionar($id)
    {
        if (is_null($this->puesto->empleado)) {
            $candidato = Candidato::find($id);
            $candidato->contratar($candidato->salario_deseado, now());
        }
    }
}
