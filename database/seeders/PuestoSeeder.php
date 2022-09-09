<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


use App\Models\Departamento;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puestos')->insert([
            'nombre' => 'Desarrollador Web',
            'riesgo' => 'bajo',
            'salario_minimo' => 50000,
            'salario_maximo' => 70000,
            'activo' => true,
            'departamento_id' => Departamento::where('descripcion', 'IT')->first()->id,
            'created_at' => now(),
            'updated_at' => now()
         ]);
        DB::table('puestos')->insert([
            'nombre' => 'Analista de Sistemas',
            'riesgo' => 'bajo',
            'salario_minimo' => 50000,
            'salario_maximo' => 70000,
            'activo' => true,
            'departamento_id' => Departamento::where('descripcion', 'IT')->first()->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('puestos')->insert([
            'nombre' => 'Contador',
            'riesgo' => 'bajo',
            'salario_minimo' => 50000,
            'salario_maximo' => 70000,
            'activo' => true,
            'departamento_id' => Departamento::where('descripcion', 'Finanzas')->first()->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
