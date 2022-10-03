<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function contratar($salario = null, $desde = null)
    {
        $salario = !is_null($salario) ? $salario : $this->salario_deseado;
        $desde = !is_null($desde) ? $desde : now();

        if (is_null($this->puesto->empleado_id)) {
            $empleado = Empleado::firstOrNew(
                ['persona_id' => $this->persona_id],
            );
            $empleado->persona_id = $this->persona_id;
            $empleado->salario = $salario;
            $empleado->desde = $desde;
            $empleado->activo = true;
            $empleado->save();
            $this->puesto->activo = false;
            $this->puesto->save();
            return $this->puesto->contratar($empleado);
        }
    }
}
