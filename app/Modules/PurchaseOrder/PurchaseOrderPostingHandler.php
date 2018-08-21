<?php

namespace App\Modules\PurchaseOrder;

use App\Modules\PurchaseOrder\Models\PurchaseOrderHeader;

/**
 *
 * @author ervinne
 */
interface PurchaseOrderPostingHandler
{
    function post(PurchaseOrderHeader $poHeader);
}
