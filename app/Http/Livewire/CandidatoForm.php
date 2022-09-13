<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidato;

class CandidatoForm extends Component
{
    public Candidato $candidato;

    protected $listeners = ['recordChanged' => 'refreshRecord'];


    protected $rules = [
        'candidato.nombre' => 'required|string|min:3',
        'candidato.salario_deseado' => 'required|double'
    ];

    public function save()
    {
        $this->validate();

        if ($this->candidato->save()) {
            $this->emit("recordSaved");
        } else {
        }
    }

    public function refreshRecord($id)
    {
        if ($id == -1) {
            $this->candidato = new Candidato();
        } else {
            $this->candidato = Candidato::find($id);
        }
    }

    public function cancel()
    {
        $this->emit("closeForm");
    }
    public function render()
    {
        return view('livewire.candidato-form');
    }
}
