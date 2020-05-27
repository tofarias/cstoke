<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use CStoke\ProductOut;
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

$factory->define(ProductOut::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 400, $max = 600),
        'amount' => $faker->numberBetween($min = 1, $max = 20),
        'product_id' => function (array $item) use ($faker) { return CStoke\ProductIn::all()->pluck('product_id')->random(); },
        'created_by' => function (array $item) use ($faker) { return CStoke\User::findOrFail(1); },
        'updated_by' => function (array $item) use ($faker) { return $item['created_by']; },
        'created_at' => function (array $item) use ($faker) { 
            $productIn = CStoke\Product::find($item['product_id']);

            if( $item['product_id'] % 2 == 0 ){
                return $productIn->created_at->addHour();
            }else{
                return $productIn->created_at->addDay();
            }
        },
        'updated_at' => function (array $item) use ($faker) { return $item['created_at']; }
    ];
});
