<?php

namespace App\Http\Controllers;

use App\Modules\Module\Models\Module;
use App\User;

class TestController extends Controller
{

    public function testRelationships()
    {
        $module = Module::with('number_series_list')
                ->with('active_number_series')
                ->find('PO');
        return $module;
    }

    public function testManyToMany()
    {
        $user = User::with('roles')
                ->find(1);

        return $user;
    }

}
