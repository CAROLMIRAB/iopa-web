<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'excerpt' => $faker->text(200), 
        'specialty_id' => '2',
    ];
});
