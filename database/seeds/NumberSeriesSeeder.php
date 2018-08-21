<?php

use App\Modules\Module\Models\NumberSeries;
use Illuminate\Database\Seeder;

class NumberSeriesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NumberSeries::create([
            'code'            => 'PO_2018',
            'module_code'     => 'PO',
            'starting_number' => 0,
            'ending_number'   => 999999
        ]);

        NumberSeries::create([
            'code'            => 'SI_2018',
            'module_code'     => 'SI',
            'starting_number' => 0,
            'ending_number'   => 999999
        ]);
    }

}
