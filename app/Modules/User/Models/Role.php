<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public $incrementing = false;
    protected $primaryKey = 'code';

    public function users()
    {
        
    }

}
