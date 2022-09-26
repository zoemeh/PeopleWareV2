<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Puesto;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Collection;

class PuestoForm extends Component
{
    public Puesto $puesto;
    protected $listeners = ['recordChanged' => 'refreshRecord'];
    public Collection $departamentos;

    protected $rules = [
        'puesto.nombre' => 'required|string|min:3',
        'puesto.riesgo' => 'required|string',
        'puesto.salario_minimo' => 'required|numeric:lte:salario_maximo',
        'puesto.salario_maximo' => 'required|numeric',
        'puesto.departamento_id' => 'required|numeric',
        'puesto.activo' => 'nullable|boolean',
    ];

    public function render()
    {
        return view('livewire.puesto-form');
    }

    public function mount()
    {
        $this->departamentos = Departamento::orderBy("created_at")->get();
    }

    public function save()
    {
        if (is_null($this->puesto->departamento_id)) {
            $this->puesto->departamento_id = $this->departamentos->first()->id;
        }

        $this->validate();

        if ($this->puesto->save()) {
            $this->emit("recordSaved");
        } else {
        }
    }

    public function refreshRecord($id)
    {
        if ($id == -1) {
            $this->puesto = new Puesto();
        } else {
            $this->puesto = Puesto::find($id);
        }
    }

    public function cancel()
    {
        $this->emit("closeForm");
    }
}
