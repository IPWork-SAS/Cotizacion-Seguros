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
            'nombres' => Str::random(10),
            'apellidos' => Str::random(10),
            'numero_documento' => Str::random(10),
            'telefono' => Str::random(10),
            'correo'=>Str::random(10),
            'ubicacion'=>Str::random(10)
        ]);
    }
}
