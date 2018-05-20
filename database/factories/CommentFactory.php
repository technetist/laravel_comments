<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});
