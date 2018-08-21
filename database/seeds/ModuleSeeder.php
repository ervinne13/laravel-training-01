<?php

use App\Modules\Module\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create(['code' => 'PO', 'name' => 'Purchase Order']);
        Module::create(['code' => 'SI', 'name' => 'Purchase Invoice']);
        
//        factory(Module::class, 50)->create();
    }

}
