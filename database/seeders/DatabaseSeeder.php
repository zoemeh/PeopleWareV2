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
            CapacitacionSeeder::class,
            CompetenciaSeeder::class,
            IdiomaSeeder::class,
            DepartamentoSeeder::class,
            PuestoSeeder::class
        ]);
    }
}
