<?php

namespace App\Modules\Module\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    public $incrementing = false;
    protected $primaryKey = 'code';

    /**
     * @relationship
     */
    public function number_series_list()
    {
        return $this->hasMany(NumberSeries::class, 'module_code', 'code');
    }

    /**
     * @relationship
     */
    public function active_number_series()
    {
        return $this
                        ->hasOne(NumberSeries::class, 'module_code', 'code')
                        ->where('is_active', 1);
    }

}
