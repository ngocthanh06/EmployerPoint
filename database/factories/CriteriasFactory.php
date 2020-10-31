<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Criterias::class, function (Faker $faker) {
    return [
        'criterias_name' => $faker->name,
        'point' => rand(1,10)
    ];
});
