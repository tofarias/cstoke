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
        'model' => $faker->unique()->word,
        'description' => $faker->text(50),
        'category_id' => function (array $item) use ($faker) { return CStoke\Category::all()->pluck('id')->random(); },
        'manufacturer_id' => function (array $item) use ($faker) { return CStoke\Manufacturer::all()->pluck('id')->random(); },
        'created_by' => function (array $item) use ($faker) { return CStoke\User::findOrFail(1); },
        'updated_by' => function (array $item) use ($faker) { return $item['created_by']; },
        'created_at' => $faker->dateTimeInInterval('-1 month', '+ 3 days', 'America/Sao_Paulo'),
        'updated_at' => function($item){ return $item['created_at']; }
    ];
});
