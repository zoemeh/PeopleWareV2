<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Date;
use Livewire\Component;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Exports\Empleados;
use App\Models\Empleado;
use Maatwebsite\Excel\Facades\Excel;

class ReporteForm extends Component
{
    public $desde;
    public $hasta;

    protected $rules = [
        'desde' => 'required|date|before:hasta',
        'hasta' => 'required|date|after:desde',
    ];

    public function render()
    {
        return view('livewire.reporte-form');
    }

    public function generar()
    {
        $this->validate();
        $empleados = Empleado::all();
        return Excel::download(new Empleados($empleados), 'empleados.xlsx');    }
}
