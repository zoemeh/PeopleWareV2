<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function competencias()
    {
        return $this->belongsToMany(Competencia::class);
    }
    public function idiomas()
    {
        return $this->belongsToMany(Idioma::class);
    }
    

    public function candidato()
    {
        return $this->hasOne(Candidato::class);
    }
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    public function capacitaciones()
    {
        return $this->hasMany(Capacitacion::class);
    }

    public function experiencias()
    {
        return $this->hasMany(Experiencia::class);
    }

    
}
