<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            'descripcion' => 'IT',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('departamentos')->insert([
            'descripcion' => 'Finanzas',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('departamentos')->insert([
            'descripcion' => 'Recursos Humanos',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('departamentos')->insert([
            'descripcion' => 'Mercadeo',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
