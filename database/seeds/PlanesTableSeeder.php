<?php

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Integer;

class PlanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('planes')->insert([
            'nombre_plan' => 'Seguro de vida A',
            'clave' => Str::random(10),
            'id_aseguradora' => 1
        ]);
        DB::table('planes')->insert([
            'nombre_plan' => 'Seguro de vida B',
            'clave' => Str::random(10),
            'id_aseguradora' => 2
        ]);
        
    }
}
