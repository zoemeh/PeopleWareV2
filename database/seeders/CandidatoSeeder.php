<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Puesto;
use App\Models\Persona;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidatos')->insert([
            'persona_id' => Persona::orderBy("id")->first()->id,
            'puesto_id' => Puesto::orderBy("id")->first()->id,
            'salario_deseado' => 52000,
            'recomendado_por' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Puesto::all()->each(function ($p) {
            if (!is_null($p->candidatos->first())) {
                $p->candidatos->first()->contratar();
            }
        });
    }
}
