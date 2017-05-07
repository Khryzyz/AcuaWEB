<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsuarioTableSeeder extends Seeder {

    public function run() {
        \DB::table('usuario')->insert(array(
            'username' => 'chris',
            'password' => \Hash::make('123456'),
            'email'=>'chris3154@gmail.com',
            'role'=>'superadmin',
            'primer_nombre' => 'CHRISTHIAN',
            'segundo_nombre' => 'HERNANDO',
            'primer_apellido' => 'TORRES',
            'segundo_apellido' => 'NIÑO',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ));
    }

    //put your code here
}
