<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidato;
use App\Models\Persona;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Collection;

class CandidatoForm extends Component
{
    public Candidato $candidato;
    public Collection $puestos;
    public Collection $personas;

    protected $listeners = ['recordChanged' => 'refreshRecord'];


    protected $rules = [
        'candidato.persona_id' => 'required|integer',
        'candidato.salario_deseado' => 'required|numeric',
        'candidato.puesto_id' => 'required|numeric',
        'candidato.recomendado_por' => 'nullable|string',
    ];

    public function mount()
    {
        $this->puestos = Puesto::orderBy("created_at")->get();
        $this->personas = Persona::orderBy("created_at")->get();
    }

    public function save()
    {
        if (is_null($this->candidato->puesto_id)) {
            $this->candidato->puesto_id = $this->puestos->first()->id;
        }
        if (is_null($this->candidato->persona_id)) {
            $this->candidato->persona_id = $this->personas->first()->id;
        }
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
