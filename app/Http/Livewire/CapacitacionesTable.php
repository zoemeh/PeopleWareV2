<?php

namespace App\Http\Livewire;

use App\Models\Capacitacion;
use App\Models\Persona;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class CapacitacionesTable extends Component
{

    public bool $formVisible = false;
    public Capacitacion $currentCapacitacion;
    public Collection $capacitaciones;
    public bool $showVisible = false;
    public Persona $persona;
    public bool $perfil = false;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm', 'closeShow' => 'closeShow'];


    public function mount()
    {
        $this->currentCapacitacion = new Capacitacion();
        if (!$this->perfil) {
            $this->capacitaciones = Capacitacion::orderBy("created_at")->get();
        } else {
            $this->capacitaciones = $this->persona->capacitaciones;
        }
    }

    public function render()
    {
        if (!$this->perfil) {
            $this->capacitaciones = Capacitacion::orderBy('id')->get();
        }
        return view('livewire.capacitaciones-table');
    }

    public function create()
    {
        $this->currentCapacitacion =  new Capacitacion();
        $this->emit("recordChanged", -1);
        $this->formVisible = true;
    }

    public function update(Capacitacion $capacitacion)
    {
        $this->currentCapacitacion = $capacitacion;
        $this->formVisible = true;
        $this->emit("recordChanged", $this->currentCapacitacion->id);
    }

    public function delete($id)
    {
        $r = Capacitacion::find($id);
        $r->delete();
    }
    public function recordSaved()
    {
        $this->formVisible = false;
    }

    public function show($id)
    {
        $this->currentCapacitacion = Capacitacion::find($id);
        $this->emit("recordChanged", $this->currentCapacitacion->id);
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
