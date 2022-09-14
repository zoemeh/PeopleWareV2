<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;

    protected $attributes = [
        'activo' => false,
    ];

    public function personas()
    {
        return $this->belongsToMany(Persona::class);
    }
}
