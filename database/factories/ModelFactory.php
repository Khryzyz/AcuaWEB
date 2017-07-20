<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(aplicacion\Usuario::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->email,
        'tusuario_id' => $faker->numberBetween(1, 3),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
