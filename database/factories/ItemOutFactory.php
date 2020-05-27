<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use CStoke\ItemOut;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(ItemOut::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 400, $max = 600),
        'amount' => $faker->numberBetween($min = 1, $max = 20),
        'product_id' => function (array $post) use ($faker) {
            return CStoke\Category::find( $faker->numberBetween(1, CStoke\Category::count() ));
        },
        'created_by' => function (array $post) use ($faker) {
            return CStoke\User::findOrFail(1);
        },
        'updated_by' => function (array $post) use ($faker) {
            return CStoke\User::findOrFail(1);
        }
    ];
});
