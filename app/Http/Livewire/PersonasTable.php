<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PersonasTable extends Component
{
    public Collection $personas;
    public bool $formVisible = false;
    public Persona $currentPersona;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm'];

    public function mount()
    {
        $this->personas = Persona::orderBy("created_at")->get();
    }
    public function render()
    {
        $this->personas = Persona::orderBy('id')->get();
        return view('livewire.personas-table');
    }

    public function create()
    {
        $this->currentPersona = new Persona();
        $this->emit("recordChanged", -1);
        $this->formVisible = true;
    }

    public function update(Persona $persona)
    {
        $this->currentPersona = $persona;
        $this->formVisible = true;
        $this->emit("recordChanged", $this->currentPersona->id);
    }

    public function delete($id)
    {
        $r = Persona::find($id);
        $r->delete();
    }
    public function recordSaved()
    {
        $this->formVisible = false;
    }

    public function show($id)
    {
        return redirect()->route("persona.show", $id);
    }

    public function closeForm()
    {
        $this->formVisible = false;
    }
}
