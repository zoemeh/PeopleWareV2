<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DepartamentoForm extends Component
{

    public $departamento;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($departamento)
    {
        $this->departamento = $departamento;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.departamento-form');
    }
}
