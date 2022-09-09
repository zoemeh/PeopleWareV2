<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CompetenciaForm extends Component
{

    public $competencia;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($competencia)
    {
        $this->competencia = $competencia;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.competencia-form');
    }
}
