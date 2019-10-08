<?php

use Illuminate\Database\Seeder;

class ValoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valores')->insert([
            'valor' => '5000',
            'id_rango_edad' => 1,
            'id_valor_seguro' => 1
        ]);
        DB::table('valores')->insert([
            'valor' => '5000',
            'id_rango_edad' => 1,
            'id_valor_seguro' => 2
        ]);
        DB::table('valores')->insert([
            'valor' => '5000',
            'id_rango_edad' => 2,
            'id_valor_seguro' => 1
        ]);
        DB::table('valores')->insert([
            'valor' => '5000',
            'id_rango_edad' => 2,
            'id_valor_seguro' => 2
        ]);
    }
}
