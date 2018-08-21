<?php

namespace App\Modules\PurchaseOrder\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderHeader extends Model
{

    public $incrementing = false;
    protected $primaryKey = 'transaction_code';
    protected $fillable = [
        'transaction_code',
        'transaction_date',
        'vendor',
        'total_amount'
    ];

    protected $dates = [
        'transaction_date'
    ];
    
    public function details()
    {
        return $this->hasMany(PurchaseOrderDetail::class, 'transaction_code', 'transaction_code');
    }

}
