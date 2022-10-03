<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class SimpleTable extends Component
{
    public $records;
    public array $columns;
    public string $resource;
    public bool $formVisible = false;
    public bool $showVisible = false;
    public $currentRecord;
    public bool $perfil = false;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm', 'closeShow' => 'closeShow'];

    public function render()
    {
        if (!$this->perfil) {
            $this->records = $this->currentRecord::class::orderBy('id')->get();
        }
        return view('livewire.simple-table')->with("records", $this->records);
    }

    public function create()
    {
        $this->currentRecord =  new ($this->currentRecord::class);
        $this->emit("recordChanged", -1);
        $this->formVisible = true;
    }

    public function update($id)
    {
        $this->currentRecord = $this->currentRecord::class::find($id);
        $this->formVisible = true;
        $this->emit("recordChanged", $this->currentRecord->id);
    }

    public function delete($id)
    {
        $r = $this->currentRecord::class::find($id);
        $r->delete();
    }
    public function recordSaved()
    {
        $this->formVisible = false;
    }

    public function show($id)
    {
        $this->currentRecord = $this->currentRecord::class::find($id);
        $this->emit("recordChanged", $this->currentRecord->id);
        $this->formVisible = false;
        $this->showVisible = true;
    }

    public function closeForm()
    {
        $this->formVisible = false;
    }
    public function closeShow()
    {
        $this->showVisible = false;
    }
}
