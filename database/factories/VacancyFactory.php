<?php

use Faker\Generator as Faker;
use App\Modules\Vacancy\Models\Vacancy;

$factory->define(Vacancy::class, function (Faker $faker) {
    static $id = 1;

    return [
        'position'=>$faker->jobTitle,
        'details'=>$faker->text,
        'company_id'=>$faker->randomNumber,
        'image' =>$faker->imageUrl,
        'holiday_type' => $faker->jobTitle,
        'salary'=> $faker->randomNumber,
        'location'=>$faker->address,
        'total_vacancy'=>$faker->randomNumber

    ];
});
