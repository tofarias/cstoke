<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use CStoke\Product;
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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'model' => $faker->word,
        'description' => $faker->text(50),
        'category_id' => function (array $post) use ($faker) {
            return CStoke\Category::find( $faker->numberBetween($min = 1, $max = 9) );
        },
        'manufacturer_id' => function (array $post) use ($faker) {
            return CStoke\Manufacturer::find( $faker->numberBetween($min = 1, $max = 11) );
        },
        'created_by' => function (array $post) use ($faker) {
            return CStoke\User::findOrFail(1);
        },
        'updated_by' => function (array $post) use ($faker) {
            return CStoke\User::findOrFail(1);
        }
    ];
});
