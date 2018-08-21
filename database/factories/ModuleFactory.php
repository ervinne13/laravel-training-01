<?php

use App\Modules\Module\Models\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {

    //  Referrence https://github.com/fzaninotto/Faker
    return [
        'code' => $faker->unique()->text(5),
        'name' => $faker->text(30)
    ];
});
