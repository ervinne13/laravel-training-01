<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelTreats\Model\Traits\HasCompositePrimaryKey;

class UserRole extends Model
{

    use HasCompositePrimaryKey;
    
    protected $primaryKey = ['user_id', 'role_code'];

}
