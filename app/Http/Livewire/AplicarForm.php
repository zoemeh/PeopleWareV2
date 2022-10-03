<?php

namespace App\Http\Livewire;

use App\Models\Candidato;
use App\Models\Capacitacion;
use App\Models\Competencia;
use App\Models\Experiencia;
use App\Models\Idioma;
use App\Models\Persona;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\User;
use App\Rules\Cedula;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AplicarForm extends Component
{
    public Puesto $puesto;
    public Collection $idiomas;
    public array $idiomas_seleccionados;
    public Collection $competencias;
    public Collection $experiencias;
    public Collection $capacitaciones;
    public Persona $persona;
    public Candidato $candidato;
    public int $capacitacion_errors;
    public int $experiencia_errors;
    public array $competencias_seleccionadas;


    protected $listeners = [
        'recordChanged' => '$refresh', 'eliminarExperiencia' => "eliminarExperiencia", "eliminarCapacitacion" => "eliminarCapacitacion",
        "replyValidarCapacitacion" => "replyValidarCapacitacion", "replyValidarExperiencia" => "replyValidarExperiencia"
    ];

    protected function rules()
    {
        return
            [
                'candidato.persona_id' => 'required|integer',
                'candidato.salario_deseado' => 'required|numeric',
                'candidato.puesto_id' => 'required|numeric',
                'candidato.recomendado_por' => 'nullable|string',
                'persona.nombre' => 'required|string',
                'persona.cedula' => ['required', new Cedula],
                'idiomas_seleccionados' => 'nullable',
                'competencias_seleccionadas' => 'nullable'
            ];
    }

    public function mount()
    {
        $this->persona = new Persona();
        $this->candidato = new Candidato();
        $this->candidato->puesto_id = $this->puesto->id;
        $this->idiomas = Idioma::where("activo", true)->orderBy("id")->get();
        $this->competencias = Competencia::where("activo", true)->orderBy("id")->get();
        $this->experiencias = new Collection();
        $this->capacitaciones = new Collection();
        $this->experiencias->push(new Experiencia());
        $this->capacitaciones->push(new Capacitacion());
        $this->capacitacion_errors = 0;
        $this->experiencia_errors = 0;
        $this->idiomas_seleccionados = array();
        $this->competencias_seleccionadas = array();
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

    public function save()
    {
        $this->capacitacion_errors = 0;
        $this->experiencia_errors = 0;
        $this->emit("validar");
        $this->validate();
    }

    public function replyValidarCapacitacion()
    {
        $this->capacitacion_errors += 1;
        if ($this->capacitacion_errors == $this->capacitaciones->count()) {
            $this->reallySave();
        }
    }

    public function replyValidarExperiencia()
    {
        $this->experiencia_errors += 1;
        if ($this->experiencia_errors == $this->experiencias->count()) {
            $this->reallySave();
        }
    }

    public function reallySave()
    {
        if (($this->experiencia_errors == $this->experiencias->count()) && ($this->capacitacion_errors == $this->capacitaciones->count())) {
            $this->persona->save();
            $this->candidato->persona_id = $this->persona->id;
            $this->persona->idiomas()->attach($this->idiomas_seleccionados);
            $this->persona->competencias()->attach($this->competencias_seleccionadas);
            $this->persona->save();
            $this->candidato->save();
            $this->emit("saveWithPersona", $this->persona->id);
            $user = User::create([
                'name' => $this->persona->nombre,
                'email' => $this->persona->cedula,
                'role' => "candidato",
                'password' => Hash::make($this->persona->cedula),
            ]);
            Auth::login($user);
            return redirect()->to('/perfil');
        }
    }
}
