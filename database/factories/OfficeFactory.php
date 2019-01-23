<?php

use Faker\Generator as Faker;

$factory->define(App\Office::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'name' => $title,
        'photo' => $faker->imageUrl($width = 1200, $height = 400), 
        'map' => $faker->url,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address, 
        'slug' => str_slug($title),      
    ];
});
