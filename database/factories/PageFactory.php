<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Page\Models\Page::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->sentence,
        'content' => $faker->text,
        'user_id'=> $faker->Numbers,
        'image'=> $faker->image
    ];
});
