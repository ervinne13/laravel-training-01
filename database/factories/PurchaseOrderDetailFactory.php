<?php

use App\Modules\PurchaseOrder\Models\PurchaseOrderDetail;
use Faker\Generator as Faker;

$factory->define(PurchaseOrderDetail::class, function (Faker $faker) {

    $unitPrice = $faker->numberBetween(100, 999);
    $qty = $faker->numberBetween(1, 5);
    $totalAmount = $unitPrice * $qty;

    return [
        'item_name'        => $faker->word,
        'item_description' => $faker->sentence,
        'unit_price'       => $unitPrice,
        'qty'              => $qty,
        'total_amount'     => $totalAmount,
    ];
});
