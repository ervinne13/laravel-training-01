<?php

namespace App\Http\Controllers;

use App\Modules\PurchaseOrder\Models\PurchaseOrderHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function redirect;
use function view;

class PurchaseOrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('modules.purchase-order.index', [
            'purchaseOrders' => PurchaseOrderHeader::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $purchaseOrder = new PurchaseOrderHeader();
        return view('modules.purchase-order.form', [
            'submitRoute' => 'po.store',
            'po'          => $purchaseOrder
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $purchaseOrder = new PurchaseOrderHeader();
        $purchaseOrder->fill($request->all());

        $purchaseOrder->transaction_date = Carbon::now();
        $purchaseOrder->total_amount = 0;

        $purchaseOrder->save();

        $this->saveSupportingDocument($request, $purchaseOrder);

        $request->session()->flash('alert-success', 'Purchase order successfully created');

        return redirect()->route('po.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $transactionCode
     * @return Response
     */
    public function show($transactionCode)
    {
        return PurchaseOrderHeader::with('details')->findOrFail($transactionCode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $transactionCode
     * @return Response
     */
    public function edit($transactionCode)
    {
        $purchaseOrder = PurchaseOrderHeader::findOrFail($transactionCode);
        return view('modules.purchase-order.form', [
            'submitRoute' => 'po.update',
            'po'          => $purchaseOrder
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $transactionCode
     * @return Response
     */
    public function update(Request $request, $transactionCode)
    {
        $purchaseOrder = PurchaseOrderHeader::findOrFail($transactionCode);
        $purchaseOrder->fill($request->all());

        $purchaseOrder->save();

        $this->saveSupportingDocument($request, $purchaseOrder);

        $request->session()->flash('alert-success', 'Purchase order successfully updated');

        return redirect()->route('po.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $transactionCode
     * @return Response
     */
    public function destroy($transactionCode)
    {
        PurchaseOrderHeader::destroy($transactionCode);
    }

    private function saveSupportingDocument(Request $request, $po)
    {
        if ($request->hasFile('supporting_document')) {
            $path = 'supporting_documents/purchase_orders/' . $po->transaction_code;
            $savedToPath = $request->file('supporting_document')->store($path, 'uploads');

            $imagePath = "assets/uploads/{$savedToPath}";
            $po->supporting_document_url = asset($imagePath);
            $po->save();
        }
    }

}
