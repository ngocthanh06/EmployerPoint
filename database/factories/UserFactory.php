<?php

use Faker\Generator as Faker;
use App\Enums\RoleStatus;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => 'demo@example.com',
        'password' => bcrypt('123123'),
        'role_id' => RoleStatus::ADMIN,
        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber,
        'username' => $faker->userName,
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName
    ];
});
