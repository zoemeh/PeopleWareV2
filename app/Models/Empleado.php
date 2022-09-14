<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function puesto()
    {
        return $this->hasOne(Puesto::class);
    }
}
