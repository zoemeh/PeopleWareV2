<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{

    public $records;
    public $columns;
    public $resource;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($records, $columns, $resource)
    {
    
        $this->records = $records;
        $this->columns = $columns;
        $this->resource = $resource;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-table');
    }
}
