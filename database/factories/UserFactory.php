<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use CStoke\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => 'admin@cstoke.com.br',
        'email_verified_at' => now(),
        'password' => '$2y$10$VQUaeN0CCattQSeBL5lT2u125DM8xEY5oGXTGJImFKAP6nlwpba7y',//Hash::make(00000),
        'remember_token' => Str::random(10),
    ];
});
