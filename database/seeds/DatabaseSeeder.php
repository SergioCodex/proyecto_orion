<?php

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
        $this->call(
            [
                RolsTableSeeder::class,
                SectorsTableSeeder::class,
                IncidenciaTableSeeder::class,
                RequisitoTableSeeder::class,
                ConsumosTableSeeder::class,
                ObjetivoTableSeeder::class,
                HorarioTableSeeder::class,
                RecursosTableSeeder::class
            ]
        );
    }
}
