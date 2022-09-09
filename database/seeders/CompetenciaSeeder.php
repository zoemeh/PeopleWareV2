<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competencias')->insert([
            'descripcion' => 'Manejor de Recursos Humanos',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('competencias')->insert([
            'descripcion' => 'Uso de Herramientas Ofimaticas',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('competencias')->insert([
            'descripcion' => 'Gestion de Presupusto',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('competencias')->insert([
            'descripcion' => 'Hablar en publico',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
