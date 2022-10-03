<?php

namespace App\Http\Livewire;

use App\Models\Competencia;
use App\Models\Empleado;
use App\Models\Idioma;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EmpleadosTable extends Component
{
    public bool $formVisible = false;
    public Empleado $currentEmpleado;
    public $empleados;
    public Collection $puestos;
    public Collection $competencias;
    public Collection $idiomas;

    public $buscar_puesto;
    public $buscar_competencias = [];
    public $buscar_idiomas = [];

    public bool $buscar = false;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm'];

    public function mount()
    {
        $this->currentEmpleado = new Empleado();
        $this->empleados = Empleado::orderBy("created_at")->get();
        $this->puestos = Puesto::all();
        $this->competencias = Competencia::all();
        $this->idiomas = Idioma::all();
    }

    public function render()
    {
        $this->empleados = Empleado::orderBy('id')->get();
        //fixme
        if ($this->buscar_idiomas) {
            $this->empleados = $this->empleados->filter(function ($e) {
                $idiomas_empleado = $e->persona->idiomas->map(function ($i) {
                    return $i->id;
                });

                return collect($this->buscar_idiomas)->contains(function ($x) use ($idiomas_empleado) {
                    return $idiomas_empleado->contains($x);
                });;
            });
        }
        if ($this->buscar_competencias) {
            $this->empleados = $this->empleados->filter(function ($e) {
                $competencias_empleado = $e->persona->competencias->map(function ($i) {
                    return $i->id;
                });

                return collect($this->buscar_competencias)->contains(function ($x) use ($competencias_empleado) {
                    return $competencias_empleado->contains($x);
                });;
            });
        }
        return view('livewire.empleados-table');
    }

    public function create()
    {
        $this->currentEmpleado =  new Empleado();
        $this->emit("recordChanged", -1);
        $this->formVisible = true;
    }

    public function update(Empleado $candidato)
    {
        $this->currentEmpleado = $candidato;
        $this->formVisible = true;
        $this->emit("recordChanged", $this->currentEmpleado->id);
    }

    public function delete($id)
    {
        $r = Empleado::find($id);
        $r->delete();
    }
    public function recordSaved()
    {
        $this->formVisible = false;
    }

    public function openBuscar()
    {
        $this->buscar = !$this->buscar;
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
