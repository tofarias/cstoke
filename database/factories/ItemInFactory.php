<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use CStoke\ItemIn;
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

$factory->define(ItemIn::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 500),
        'amount' => $faker->numberBetween($min = 100, $max = 200),
        'weight' => $faker->randomFloat($nbMaxDecimals = 3, $min = 10, $max = 50),
        'product_id' => function (array $item) use ($faker) { return CStoke\Product::all()->pluck('id')->random(); },
        'created_by' => function (array $item) use ($faker) { return CStoke\User::findOrFail(1); },
        'updated_by' => function (array $item) use ($faker) { return $item['created_by']; },
        'created_at' => function (array $item) use ($faker) { return CStoke\Product::findOrFail($item['product_id'])->created_at->addMinute(); },
        'updated_at' => function (array $item) use ($faker) { return $item['created_at']; }
    ];
});
