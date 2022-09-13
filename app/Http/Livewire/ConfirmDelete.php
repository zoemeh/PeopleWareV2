<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class ConfirmDelete extends Component
{
    public string $mensaje = "";
    public string $titulo = "Borrar registro";
    public $record_id;
    public string $modelClass;
    public $record;

    protected $listeners = ['confirmDelete' => 'open'];

    public function render()
    {
        return view('livewire.confirm-delete');
    }

    public function open($id, $modelClass, $mensaje)
    {
        $this->mensaje = $mensaje;
        $this->record_id = $id;
        $modelClass = Str::remove('"', $modelClass);
        $this->modelClass = new $modelClass();
        $this->record = $modelClass::find($id);
        $this->dispatchBrowserEvent('confirmDelete', ['descripcion' => $mensaje, 'id' => $id]);
    }

    public function confirm()
    {
        $this->dispatchBrowserEvent('closeConfirmDelete');
        $this->record->delete();
    }
}
