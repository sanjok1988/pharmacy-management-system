<?php

use Faker\Generator as Faker;
use App\Modules\Company\Models\Company;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'details' => $faker->text,
        'link'=>$faker->url
    ];
});
