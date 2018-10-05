<?php

use Faker\Generator as Faker;

$factory->define(App\Exam::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'name' => $title,
        'slug' => str_slug($title),
        'description' => $faker->text(500),
        'preparation' => $faker->text(500),
        'indications' => $faker->text(500),
        'file' => $faker->imageUrl($width = 1200, $height = 800)
    ];
});
