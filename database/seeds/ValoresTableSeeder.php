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
            'valor' => '6000',
            'id_rango_edad' => 1,
            'id_valor_seguro' => 1
        ]);
        DB::table('valores')->insert([
            'valor' => '7000',
            'id_rango_edad' => 1,
            'id_valor_seguro' => 2
        ]);
        DB::table('valores')->insert([
            'valor' => '10000',
            'id_rango_edad' => 2,
            'id_valor_seguro' => 1
        ]);
        DB::table('valores')->insert([
            'valor' => '11000',
            'id_rango_edad' => 2,
            'id_valor_seguro' => 2
        ]);
        DB::table('valores')->insert([
            'valor' => '5000',
            'id_rango_edad' => 3,
            'id_valor_seguro' => 3
        ]);
        DB::table('valores')->insert([
            'valor' => '6000',
            'id_rango_edad' => 3,
            'id_valor_seguro' => 4
        ]);
        DB::table('valores')->insert([
            'valor' => '9000',
            'id_rango_edad' => 4,
            'id_valor_seguro' => 3
        ]);
        DB::table('valores')->insert([
            'valor' => '10000',
            'id_rango_edad' => 4,
            'id_valor_seguro' => 4
        ]);
        DB::table('valores')->insert([
            'valor' => '7000',
            'id_rango_edad' => 5,
            'id_valor_seguro' => 5
        ]);
        DB::table('valores')->insert([
            'valor' => '8000',
            'id_rango_edad' => 5,
            'id_valor_seguro' => 6
        ]);
        DB::table('valores')->insert([
            'valor' => '12000',
            'id_rango_edad' => 6,
            'id_valor_seguro' => 5
        ]);
        DB::table('valores')->insert([
            'valor' => '13000',
            'id_rango_edad' => 6,
            'id_valor_seguro' => 6
        ]);
   
    }
}
