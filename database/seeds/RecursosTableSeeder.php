<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('recursos')->insert([
            'oxigeno' => 1000000,
            'agua' => 1100000,
            'alimento' => 1000000,
            'combustible' => 900000,
            'energia' => 2000000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
