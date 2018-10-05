<?php

use Faker\Generator as Faker;

$factory->define(Exam::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'name' => $title,
        'slug' => str_slug($title),
        'description' => $faker->text(200),
        'preparation' => $faker->text(500),
        'indications' => $faker->randomElement(array('DRAFT','PUBLISHED')),
    ];
});
