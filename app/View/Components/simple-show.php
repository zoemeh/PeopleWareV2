<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SimpleShow extends Component
{

    public $record;
    public $resource;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($record, $resouce)
    {
        $this->record = $record;
        $this->resource = $resource;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.simple-show');
    }
}
