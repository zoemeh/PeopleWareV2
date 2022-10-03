<?php

namespace App\Http\Livewire;

use App\Models\Candidato;
use App\Models\Puesto;
use Livewire\Component;

class ProcesoForm extends Component
{
    public Puesto $puesto;
    public Candidato $candidato_seleccionado;
    public $salario;
    public function render()
    {
        return view('livewire.proceso-form');
    }

    public function seleccionar($id)
    {
        if (is_null($this->puesto->empleado)) {
            $this->candidato_seleccionado = Candidato::find($id);
        }
    }

    public function contratar()
    {
        $this->candidato_seleccionado->contratar($this->salario, now());
    }
}
