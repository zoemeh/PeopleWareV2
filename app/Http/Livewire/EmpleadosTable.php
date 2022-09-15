<?php

namespace App\Http\Livewire;

use App\Models\Empleado;
use Livewire\Component;

class EmpleadosTable extends Component
{
    public bool $formVisible = false;
    public Empleado $currentEmpleado;
    public $empleados;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm'];

    public function mount()
    {
        $this->currentEmpleado = new Empleado();
        $this->empleados = Empleado::orderBy("created_at")->get();
    }

    public function render()
    {
        $this->empleados = Empleado::orderBy('id')->get();
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

    public function show($id)
    {
        return redirect()->route("candidato.show", $id);
    }

    public function closeForm()
    {
        $this->formVisible = false;
    }
}
