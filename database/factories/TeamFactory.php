<?php

use Faker\Generator as Faker;

$factory->define(\App\Data\Models\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'size' => 5
    ];
});
