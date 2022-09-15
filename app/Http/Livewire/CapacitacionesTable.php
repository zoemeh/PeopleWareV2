<?php

namespace App\Http\Livewire;

use App\Models\Capacitacion;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class CapacitacionesTable extends Component
{

    public bool $formVisible = false;
    public Capacitacion $currentCapacitacion;
    public Collection $capacitaciones;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm'];
    

    public function mount() {
        $this->currentCapacitacion = new Capacitacion();
        $this->capacitaciones = Capacitacion::orderBy("created_at")->get();
    }
    
    public function render()
    {
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
        return redirect()->route("capacitacion.show", $id);
    }

    public function closeForm()
    {
        $this->formVisible = false;
    }
}
