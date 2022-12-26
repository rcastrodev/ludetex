<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return Category::inRandomOrder()->first()->id;
        },
        'name'                  => $faker->name,
        'type'                  => 'HORMERO',
        'material'              => 'HIERRO',
        'format'                => 'CON CAJON DESMONTABLE',
        'measures'              => 'ANCHO 60MM X ALTO 300MM',
        'description'           => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil recusandae magni incidunt minima aperiam, nobis ratione tempora omnis consequuntur doloribus cupiditate velit porro molestias perspiciatis repellat alias. Corporis, totam delectus?</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia amet, et eveniet nostrum saepe totam ratione libero harum voluptatum perferendis molestiae earum laudantium aliquid, soluta eos error pariatur. Rerum, vel.</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa recusandae dolores, rerum ipsam maxime voluptatem iusto quas molestias laborum explicabo maiores delectus deleniti ipsum corporis doloremque similique! Provident, vitae illum.</p>',
    ];
});

