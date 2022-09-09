<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    public function Departamento()
    {
        return $this->belongsTo(Departamento::class, 'foreign_key');
    }
}
