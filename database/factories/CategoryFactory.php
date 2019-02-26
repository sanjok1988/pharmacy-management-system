<?php

use Faker\Generator as Faker;
use App\Modules\Category\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'display_name' => $faker->name,
    ];
});
