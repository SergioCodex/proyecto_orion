<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjetivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('objetivos')->insert([
                'titulo' => 'Objetivo nº' . $i,
                'id_sector' => 1,
                'id_requisitos' => $i,
                'id_consumos' => $i,
                'descripcion' => 'Descripcion general objetivo nº'.$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
