<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'name' => $faker->name,
        'lastname' => $faker->name,
        'phone' => $faker->phoneNumber,
        'excerpt' => $faker->text(200), 
        'file' => $faker->imageUrl($width = 600, $height = 600),
        'specialty_id' => '2',
        'slug' => str_slug($title),
    ];
});
