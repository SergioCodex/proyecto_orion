<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('consumos_objetivos')->insert([
                'id_objetivo' => $i,
                'oxigeno' => random_int(0, 10000),
                'agua' => random_int(0, 10000),
                'alimento' => random_int(0, 10000),
                'combustible' => random_int(0, 10000),
                'energia' => random_int(0, 10000),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
