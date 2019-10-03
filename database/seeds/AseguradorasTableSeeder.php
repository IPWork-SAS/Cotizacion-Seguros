<?php

use Illuminate\Database\Seeder;

class AseguradorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aseguradoras')->insert([
            'nombre_aseguradora' => 'Sura',
        ]);
        DB::table('aseguradoras')->insert([
            'nombre_aseguradora' => 'Liberty Seguros',
        ]);
        DB::table('aseguradoras')->insert([
            'nombre_aseguradora' => 'Allianz',
        ]);
    }
}
