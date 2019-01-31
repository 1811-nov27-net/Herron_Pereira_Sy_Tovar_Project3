<?php

use Faker\Generator as Faker;

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

$factory->define(App\OrderHistory::class, function (Faker $faker) {
    $products = '';
    for($i=0;$i<=rand(5,10);$i++)
        $products .= 'Product '.$i.'<br/>';

    return [
        'store_name' => $faker->name,
        'order_total' => rand(100,500),
        'date_order' => $faker->dateTimeBetween('-30 days', 'now', null),
        'products' => $products,
    ];
});
