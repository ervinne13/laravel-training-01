<?php

use App\Modules\PurchaseOrder\Models\PurchaseOrderHeader;
use Faker\Generator as Faker;

$factory->define(PurchaseOrderHeader::class, function (Faker $faker) {
    return [
        'transaction_code' => $faker->unique()->word,
        'transaction_date' => $faker->dateTime,
        'vendor'           => $faker->name
    ];
});
