<?php

use Illuminate\Database\Seeder;

class Rango_edadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rango_edades')->insert([
            'edad_inicial' => '1',
            'edad_final' => '15',
            'id_aseguradora' => 1,
            'id_plan' => 1
        ]);
        DB::table('rango_edades')->insert([
                'edad_inicial' => '16',
                'edad_final' => '25',
                'id_aseguradora' => 1,
                'id_plan' => 1
            ]);


            DB::table('rango_edades')->insert([
            'edad_inicial' => '1',
            'edad_final' => '15',
            'id_aseguradora' => 2,
            'id_plan' => 2
        ]);
        DB::table('rango_edades')->insert([
            'edad_inicial' => '16',
            'edad_final' => '25',
            'id_aseguradora' => 2,
            'id_plan' => 2
        ]);
        DB::table('rango_edades')->insert([
            'edad_inicial' => '1',
            'edad_final' => '15',
            'id_aseguradora' => 3,
            'id_plan' => 3
        ]);
        DB::table('rango_edades')->insert([
            'edad_inicial' => '16',
            'edad_final' => '25',
            'id_aseguradora' => 3,
            'id_plan' => 3
        ]);
    }
}
