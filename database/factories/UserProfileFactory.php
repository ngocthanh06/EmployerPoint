<?php

use Faker\Generator as Faker;

$factory->define(App\UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,10),
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber
    ];
});
