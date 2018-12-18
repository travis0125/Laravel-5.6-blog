<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(mt_rand(3, 10)),
        'content' => $faker->paragraphs(mt_rand(3, 6),true),
        'user_id' => 0,
        'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});