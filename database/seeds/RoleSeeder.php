<?php

use App\Modules\User\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['code' => 'ACCTG', 'name' => 'Accountant']);
        Role::create(['code' => 'PO_MAN', 'name' => 'Purchasing Manager']);
        Role::create(['code' => 'SI_MAN', 'name' => 'Sales Manager']);
    }

}
