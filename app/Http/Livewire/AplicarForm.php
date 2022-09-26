<?php

namespace App\Http\Livewire;

use App\Models\Competencia;
use App\Models\Idioma;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AplicarForm extends Component
{
    public Puesto $puesto;
    public Collection $idiomas;
    public Collection $competencias;

    public function mount()
    {
        $this->idiomas = Idioma::orderBy("id")->get();
        $this->competencias = Competencia::orderBy("id")->get();
    }
    public function render()
    {
        return view('livewire.aplicar-form');
    }
}
