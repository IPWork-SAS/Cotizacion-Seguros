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
            'numero_documento' => '109872665',
            'telefono' => '3224324444',
            'correo'=>'example@example.com',
            'ubicacion'=>Str::random(20)
        ]);
    }
}
