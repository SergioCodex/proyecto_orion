<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [1 => 'Indeterminado', 2 => 'Sector Médico', 3 => 'Sector Energético', 4 => 'Sector Informático', 5 => 'Sector Militar'];

        foreach ($sectors as $key => $value) {
            DB::table('sectors')->insert([
                'nombre' => $value,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
