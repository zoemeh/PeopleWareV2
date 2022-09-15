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
    public $currentRecord;

    protected $listeners = ['recordChanged' => '$refresh', 'recordSaved' => 'recordSaved', 'closeForm' => 'closeForm'];

    public function render()
    {
        $this->records = $this->currentRecord::class::orderBy('id')->get();
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
        $record = $this->currentRecord::class::find($id);
        return redirect()->route("$this->resource.show", $id);
    }

    public function closeForm()
    {
        $this->formVisible = false;
    }
}
