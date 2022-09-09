<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('idiomas')->insert([
            'descripcion' => 'Español',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('idiomas')->insert([
            'descripcion' => 'Ingles',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('idiomas')->insert([
            'descripcion' => 'Aleman',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('idiomas')->insert([
            'descripcion' => 'Frances',
            'activo' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
