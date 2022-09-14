<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Puesto;
use App\Models\Persona;

class CapacitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('capacitaciones')->insert([
            'descripcion' => 'Ingenieria Software',
            'nivel' => 'grado',
            'desde' => now()->subYear(8),
            'hasta' => now()->subYear(4),
            'institucion' => 'UNAPEC',
            'persona_id' => Persona::orderBy('id')->first()->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
