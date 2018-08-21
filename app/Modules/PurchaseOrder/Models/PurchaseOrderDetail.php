<?php

namespace App\Modules\PurchaseOrder\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelTreats\Model\Traits\HasCompositePrimaryKey;

class PurchaseOrderDetail extends Model
{

    use HasCompositePrimaryKey;

    public $incrementing = false;
    protected $primaryKey = ['transaction_code', 'line_number'];
    protected $fillable = [
        'transaction_code',
        'line_number',
        'item_name',
        'vendor',
        'total_amount'
    ];

}
