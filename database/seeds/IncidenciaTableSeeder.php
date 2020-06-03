<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidenciaTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('incidencias')->insert([
                'id_comunicador' => 1,
                'id_sector_origen' => 1,
                'id_agente' => 1,
                'titulo' => 'Ticket prueba ' . $i,
                'descripcion' => 'Descripcion general ticket nº'.$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
