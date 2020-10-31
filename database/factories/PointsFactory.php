<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Points::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'criteria_id' => rand(1, 10),
        'attendance' => today()
    ];
});
