<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            'persona_id' => Persona::orderBy("id")->first()->id,
            'salario' => 50000,
            'activo' => true,
            'desde' => now()->subMonth(4),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
