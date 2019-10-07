<?php

use App\Valor_seguro;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AseguradorasTableSeeder::class);
        $this->call(PlanesTableSeeder::class);
        $this->call(Valor_segurosTableSeeder::class);
        $this->call(Rango_edadesTableSeeder::class);
        // $this->call(UsuariosTableSeeder::class);
        // $this->call(CotizacionesTableSeeder::class);
    }
}
