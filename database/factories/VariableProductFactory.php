<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\VariableProduct;
use Faker\Generator as Faker;

$factory->define(VariableProduct::class, function (Faker $faker) {
    $product = Product::inRandomOrder()->first();
    return [
        'product_id' => $product->id, 
        'code'       => "CD.{$faker->numberBetween(1,10)}",
        'description'=> "{$product->name} {$faker->sentence}",
    ];
});

