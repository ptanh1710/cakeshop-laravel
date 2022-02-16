<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class BillController extends Controller
{
    public function list() {
        $list_bill = DB::table('bill')->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
                        ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
                        ->paginate(5);
        return view('backend.pages.bill.list')->with('list', $list_bill);
    }

    public function detail($id) {
        $detail = DB::table('bill_detail')
            ->join('product', 'product.product_id','=', 'bill_detail.product_id')
            ->where('bill_id', $id)
            ->get();
        $sumTotal =  DB::select('
                    SELECT sum(billdetail_amount*billdetail_price)
                    FROM bill_detail
                    WHERE bill_id = ?', [$id]);
        // dd($sumTotal[0]);
        $list_bill = DB::table('bill')
            ->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
            ->join('payment_bill', 'payment_bill.payment_id', '=', 'bill.payment_id')
            ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
            ->join('transport_bill', 'transport_bill.transport_id', '=', 'bill.bill_status')
            ->join('bill_detail', 'bill_detail.bill_id', '=', 'bill.bill_id')
            ->where('bill.bill_id', $id)
            ->first();
        $manager = view('backend.pages.bill.detail')->with('value', $list_bill)
                                                    ->with('list_product', $detail)
                                                    ->with('sum', $sumTotal[0]);
        return view('backend.layout')->with('backend.pages.bill.detail',$manager);

    }
}
