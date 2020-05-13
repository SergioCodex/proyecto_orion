<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('requisitos_objetivos')->insert([
                'id_objetivo' => $i,
                'oxigeno' => random_int(0, 100000),
                'agua' => random_int(0, 100000),
                'alimento' => random_int(0, 100000),
                'combustible' => random_int(0, 100000),
                'energia' => random_int(0, 100000),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
