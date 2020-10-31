<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Roles::class, function (Faker $faker) {
    return [
        'role_name' => $faker->name
    ];
});
