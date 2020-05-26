<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        $rango_tiempo = [];
        $hora_comienzo = 8;

        for ($i = 0; $i < 12; $i++) {
            $rango_tiempo[] = ["empieza" => "$hora_comienzo:00", "fin" => ++$hora_comienzo . ":00"];
        }


        foreach ($dias as $dia) {
            foreach ($rango_tiempo as $tiempo) {
                $random = random_int(1, 2);
                if ($random == 1) {
                    DB::table('horarios')->insert([
                        'id_sector' => 2,
                        'dia' => $dia,
                        'hora_inicio' => $tiempo['empieza'],
                        'hora_fin' => $tiempo['fin'],
                        'tarea' => 'Tarea cualquiera'
                    ]);
                } else {
                    DB::table('horarios')->insert([
                        'id_sector' => 2,
                        'dia' => $dia,
                        'hora_inicio' => $tiempo['empieza'],
                        'hora_fin' => $tiempo['fin'],
                        'tarea' => '1'
                    ]);
                }
            }
        }
    }
}
