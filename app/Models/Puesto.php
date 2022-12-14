<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $attributes = [
        'activo' => false,
        'riesgo' => 'bajo',
        'descripcion' => ''
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function contratar($empleado)
    {
        $this->empleado_id = $empleado->id;
        return $this->save();
    }
}
