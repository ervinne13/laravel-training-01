<?php

use App\Modules\PurchaseOrder\Models\PurchaseOrderDetail;
use App\Modules\PurchaseOrder\Models\PurchaseOrderHeader;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PurchaseOrderHeader::class, 10)
                ->create()
                ->each(function($po) {
                    $this->seedPODetails($po);
                });
    }

    private function seedPODetails(PurchaseOrderHeader $po)
    {
        $detailCountToSeed = random_int(3, 5);

        for ($i = 0; $i < $detailCountToSeed; $i ++) {
            $detailValues = [
                'transaction_code' => $po->transaction_code,
                'line_number'      => $i + 1
            ];

            $createdDetails = factory(PurchaseOrderDetail::class, 1)->create($detailValues);
            $createdDetail = $createdDetails[0];

            $po->details()->save($createdDetail);
            $po->total_amount += $createdDetail->total_amount;
            $po->save();
        }
    }

}
