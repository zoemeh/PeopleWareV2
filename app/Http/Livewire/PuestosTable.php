<?php

namespace App\Http\Livewire;

use App\Models\Puesto;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class PuestosTable extends Component
{
    public Collection  $puestos;
    public bool $formVisible = false;
    public Puesto $currentPuesto;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm'];

    public function mount()
    {
        $this->currentPuesto = new Puesto();
        $this->puestos = Puesto::orderBy("created_at")->get();
    }
    public function render()
    {
        return view('livewire.puestos-table');
    }


    public function create()
    {
        $this->currentPuesto =  new Puesto();
        $this->emit("recordChanged", -1);
        $this->formVisible = true;
    }

    public function update($id)
    {
        $this->currentPuesto = Puesto::find($id);
        $this->formVisible = true;
        $this->emit("recordChanged", $this->currentPuesto->id);
    }

    public function delete($id)
    {
        $r = Puesto::find($id);
        $r->delete();
    }
    public function recordSaved()
    {
        $this->formVisible = false;
    }

    public function show($id)
    {
        return redirect()->route("puestos.show", $id);
    }

    public function closeForm()
    {
        $this->formVisible = false;
    }
}
