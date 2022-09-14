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

    public function mount() {
        $this->currentCapacitacion = new Capacitacion();
        $this->capacitaciones = Capacitacion::orderBy("created_at")->get();
    }
    public function render()
    {
        return view('livewire.capacitaciones-table');
    }
}
