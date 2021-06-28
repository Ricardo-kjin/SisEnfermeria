<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Servicio;
use Faker\Generator as Faker;

$factory->define(Servicio::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->jobTitle(),
        'estado'=>$faker->numberBetween(1,2),
        'precio'=>$faker->randomFloat(2,100,200),
        'descripcion'=>$faker->paragraphs,
        'img_url' =>$faker->url,
    ];
});
