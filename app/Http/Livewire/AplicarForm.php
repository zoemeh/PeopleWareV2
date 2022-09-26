<?php

namespace App\Http\Livewire;

use App\Models\Capacitacion;
use App\Models\Competencia;
use App\Models\Experiencia;
use App\Models\Idioma;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AplicarForm extends Component
{
    public Puesto $puesto;
    public Collection $idiomas;
    public Collection $competencias;
    public Collection $experiencias;
    public Collection $capacitaciones;

    protected $listeners = ['recordChanged' => '$refresh', 'eliminarExperiencia' => "eliminarExperiencia", "eliminarCapacitacion" => "eliminarCapacitacion"];


    public function mount()
    {
        $this->idiomas = Idioma::orderBy("id")->get();
        $this->competencias = Competencia::orderBy("id")->get();
        $this->experiencias = new Collection();
        $this->capacitaciones = new Collection();
        $this->experiencias->push(new Experiencia());
        $this->capacitaciones->push(new Capacitacion());

    }

    public function render()
    {
        return view('livewire.aplicar-form');
    }

    public function agregar_experiencia()
    {
        $this->experiencias->push(new Experiencia());
        $this->emit("recordChanged", -1);
    }

    public function agregar_capacitacion()
    {
        $this->capacitaciones->push(new Capacitacion());
    }

    public function eliminarExperiencia($index)
    {
        $this->experiencias = $this->experiencias->reject(function ($v, $k) use ($index) {
            return $k == $index;
        });
    }

    public function eliminarCapacitacion($index)
    {
        $this->capacitaciones = $this->capacitaciones->reject(function ($v, $k) use ($index) {
            return $k == $index;
        });
    }
}
