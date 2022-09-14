<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            IdiomaSeeder::class,
            DepartamentoSeeder::class,
            PersonaSeeder::class,
            EmpleadoSeeder::class,
            CapacitacionSeeder::class,
            ExperienciaSeeder::class,
            CompetenciaSeeder::class,
            PuestoSeeder::class,
            CandidatoSeeder::class
        ]);
    }
}
