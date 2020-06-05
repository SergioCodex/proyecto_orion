<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$sectors = [1 => 'Indeterminado', 2 => 'Sector Médico', 3 => 'Sector Energético', 4 => 'Sector Informático', 5 => 'Sector Militar'];
        $roles = ['Operario', 'Superior', 'Capitan'];

        foreach ($roles as $key => $value) {
            DB::table('rols')->insert([
                'nombre' => $value,
                'desc' => $value . ' de la nave.',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
