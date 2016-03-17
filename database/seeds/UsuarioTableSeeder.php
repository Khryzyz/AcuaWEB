<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder {

    public function run() {
        /*
        \DB::table('usuario')->insert(array(
            'identificacion' => '1120000000',
            'username' => 'pedro',
            'password' => \Hash::make('secret'),
            'primer_nombre' => 'pedro',
            'primer_apellido' => 'demalas',
            'celular' => '3000000000',
            'tusuario_id' => '1'
        ));
        */
        \DB::table('usuario')->insert(array(
            'identificacion' => '1121843962',
            'username' => 'chris',
            'password' => \Hash::make('123456'),
            'primer_nombre' => 'Christhian',
            'segundo_nombre' => 'Hernando',
            'primer_apellido' => 'Torres',
            'segundo_apellido' => 'Niño',
            'correo'=>'chris3154@gmail.com',
            'telefono'=>'6666666',
            'celular' => '3000000000',
            'tusuario_id' => '1'
        ));       
    }

    //put your code here
}
