<?php

use Faker\Generator as Faker;

$factory->define(App\PostType::class, function (Faker $faker) {
    return [
        'name' => $faker->words(mt_rand(1, 3),true)
    ];
});