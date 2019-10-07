<?php

use Illuminate\Database\Seeder;

class Valor_segurosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valor_seguro')->insert([
            'valor_seguro' => '120000',
            'id_plan' => 1,
            'id_aseguradora' => 1
        ]);
        DB::table('valor_seguro')->insert([
            'valor_seguro' => '230000',
            'id_plan' => 1,
            'id_aseguradora' => 1
        ]);
        DB::table('valor_seguro')->insert([
            'valor_seguro' => '150000',
            'id_plan' => 2,
            'id_aseguradora' => 2
        ]);
        DB::table('valor_seguro')->insert([
            'valor_seguro' => '230000',
            'id_plan' => 2,
            'id_aseguradora' => 2
        ]);
        DB::table('valor_seguro')->insert([
            'valor_seguro' => '150000',
            'id_plan' => 3,
            'id_aseguradora' => 3
        ]);
        DB::table('valor_seguros')->insert([
            'valor_seguro' => '230000',
            'id_plan' => 3,
            'id_aseguradora' => 3
        ]);
    }
}
