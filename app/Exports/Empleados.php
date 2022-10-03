<?php

namespace App\Exports;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class Empleados implements FromCollection
{
    public Collection $empleados;


    public function __construct(Collection $empleados)
    {
        $this->empleados = $empleados;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ex = [["Nombre", "Cedula", "Puesto", "Departamento", "Salario", "Fecha de Ingreso"]];
        $rows = $this->empleados->map(function ($x) use ($ex) {
            return [$x->persona->nombre, $x->persona->cedula, $x->puesto->nombre, $x->puesto->departamento->descripcion, $x->salario, $x->desde];
        });

        return collect($ex)->concat($rows);
    }
}
