<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Posts\Models\Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'highlights' => $faker->sentence,
        'content' => $faker->text,
        'category' => $faker->name,
        'link' => $faker->url,
        'publish_date' => $faker->date,
        'views' => $faker->randomNumber,
        'user_id'=> $faker->randomNumber
    ];
});
