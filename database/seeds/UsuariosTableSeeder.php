<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombres' => 'Luisa',
            'apellidos' => 'Jaramillo',
            'tipo_documento' => 'CC',
            'numero_documento' => '109872665',
            'telefono' => '3224324444',
            'correo'=> 'example@example.com',
            'edad' => '10',
            'ubicacion'=>Str::random(20)
        ]);
    }
}
