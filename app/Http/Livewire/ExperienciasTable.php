<?php

namespace App\Http\Livewire;

use App\Models\Experiencia;
use App\Models\Persona;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class ExperienciasTable extends Component
{
    public bool $formVisible = false;
    public Experiencia $currentExperiencia;
    public Collection $experiencias;
    public bool $showVisible = false;
    public Persona $persona;
    public bool $perfil = false;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm', 'closeShow' => 'closeShow'];

    public function mount()
    {
        $this->currentExperiencia = new Experiencia();
        if (is_null($this->persona)) {
            $this->experiencias = Experiencia::orderBy("created_at")->get();
        } else {
            $this->experiencias = $this->persona->experiencias;
        }
    }

    public function render()
    {
        if (!$this->perfil) {
            $this->experiencias = Experiencia::orderBy('id')->get();
        }
        return view('livewire.experiencias-table');
    }

    public function create()
    {
        $this->currentExperiencia =  new Experiencia();
        $this->emit("recordChanged", -1);
        $this->formVisible = true;
    }

    public function update(Experiencia $experiencia)
    {
        $this->currentExperiencia = $experiencia;
        $this->formVisible = true;
        $this->emit("recordChanged", $this->currentExperiencia->id);
    }

    public function delete($id)
    {
        $r = Experiencia::find($id);
        $r->delete();
    }
    public function recordSaved()
    {
        $this->formVisible = false;
    }

    public function show($id)
    {
        $this->currentExperiencia = Experiencia::find($id);
        $this->emit("recordChanged", $this->currentExperiencia->id);
        $this->formVisible = false;
        $this->showVisible = true;
    }

    public function closeForm()
    {
        $this->showVisible = false;
        $this->formVisible = false;
    }

    public function closeShow()
    {
        $this->showVisible = false;
    }
}
