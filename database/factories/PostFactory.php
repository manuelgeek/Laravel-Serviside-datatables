<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence,
        'body'=> $faker->paragraph,
        'category'=> $faker->city,
        'status'=> $faker->boolean,
        'user_id'=> $faker->numberBetween(1,10),
    ];
});
