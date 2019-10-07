<?php

use Illuminate\Database\Seeder;

class CotizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_get('America/Bogota');
        DB::table('cotizaciones')->insert([
            'nombre_cotizante' => 'Seguro de vida A',
            'fecha_inicio' => date('Y-m-d'),
            'fecha_inicio' => date('Y-m-d')+rand(1, 10),
            'valor_dia' => 50000,
            'valor_total' => 400000,
            'id_usuario' => 1,
            'id_aseguradora' => 1,
            'id_plan' => 1,
            'id_rango_edad'=> 1,
            'id_valor_seguro' => 1
        ]);
    }
}
