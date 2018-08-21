<?php

namespace App\Modules\Module\Models;

use Illuminate\Database\Eloquent\Model;

class NumberSeries extends Model
{

    public $incrementing = false;
    protected $primaryKey = 'code';

}
