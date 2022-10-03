<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id',
    ];
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function puesto()
    {
        return $this->hasOne(Puesto::class);
    }

    protected static function booted()
    {
        static::deleting(function ($empleado) {
            $p = $empleado->puesto;
            $p->empleado_id = null;
            $p->save();
        });
    }
}
