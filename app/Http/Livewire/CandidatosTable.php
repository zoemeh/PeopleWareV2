<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidato;

class CandidatosTable extends Component
{
    public bool $formVisible = false;
    public Candidato $currentCandidato;
    public $candidatos;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm'];

    public function mount()
    {
        $this->currentCandidato = new Candidato();
        $this->candidatos = Candidato::orderBy("created_at")->get();
    }
    public function render()
    {
        return view('livewire.candidatos-table');
    }

    public function create()
    {
        $this->currentCandidato =  new Candidato();
        $this->emit("recordChanged", -1);
        $this->formVisible = true;
    }

    public function update(Candidato $candidato)
    {
        $this->currentRecord = $candidato;
        $this->formVisible = true;
        $this->emit("recordChanged", $this->currentCandidato->id);
    }

    public function delete($id)
    {
        $r = $this->currentRecord::class::find($id);
        $r->delete();
    }
    public function recordSaved()
    {
        $this->formVisible = false;
    }

    public function show($id)
    {
        return redirect()->route("candidato.show", $id);
    }

    public function closeForm()
    {
        $this->formVisible = false;
    }
}
