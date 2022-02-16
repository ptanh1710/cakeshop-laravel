<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();


class BillStatusController extends Controller
{
    public function list () {
        $list_bill = DB::table('bill')->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
                        ->join('payment_bill', 'payment_bill.payment_id', '=', 'bill.payment_id')
                        ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
                        ->join('transport_bill', 'transport_bill.transport_id', '=', 'bill.bill_status')
                        ->paginate(5);
        $count = DB::table('bill')->get()->count();
        return view('backend.pages.bill_status.list')->with('list', $list_bill)->with('count', $count);
        // dd($list_bill);
    }

    public function change_bill_status($id) {
        $check = DB::table('bill')->where('bill_id', $id)->first();
        switch ($id){
            case $check->bill_status == 2:
                DB::table('bill')->where('bill_id', $id)->update(['bill_status'=>3]);
                Session::put('message','Thay đổi trang thái đơn đặt hàng mã đơn số '.$id.' thành công');
                break;

            case $check->bill_status == 3:
                DB::table('bill')->where('bill_id', $id)->update(['bill_status'=>4]);
                Session::put('message','Thay đổi trang thái đơn đặt hàng mã đơn số '.$id.' thành công');
                break;

            case $check->bill_status == 4:
                DB::table('bill')->where('bill_id', $id)->update(['bill_status'=>5]);
                Session::put('message','Thay đổi trang thái đơn đặt hàng mã đơn số '.$id.' thành công');
                break;
        }
        return redirect('/admin/list_shipping');
    }

    public function show_bill_status(Request $request) {
        $date = $request->bill_date;
        $countProduct = DB::table('product')->get()->count();
        $countAdmin = DB::table('admin')->get()->count();
        $countConsumer = DB::table('consumer')->get()->count();
        $countBill = DB::table('bill')->get()->count();
        $list_bill = DB::table('bill')->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
                    ->join('payment_bill', 'payment_bill.payment_id', '=', 'bill.payment_id')
                    ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
                    ->join('transport_bill', 'transport_bill.transport_id', '=', 'bill.bill_status')
                    ->where('bill.bill_date', $date)
                    ->get();
        $count = DB::table('bill')->where('bill.bill_date', $date)->get()->count();
        $countTotal = DB::table('bill')->get()->count();
        return view('backend.pages.search')
                    ->with('countProduct', $countProduct)
                    ->with('countAdmin', $countAdmin)
                    ->with('countConsumer', $countConsumer)
                    ->with('countBill', $countBill)
                    ->with('count', $count)
                    ->with('countTotal', $countTotal)
                    ->with('list', $list_bill)
                    ->with('dateSelect',$date);
    }

    public function show_bill_product (Request $request) {
        $date = $request->bill_date;
        $status = $request->bill_status;

        $list_bill = DB::table('bill')->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
                        ->join('payment_bill', 'payment_bill.payment_id', '=', 'bill.payment_id')
                        ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
                        ->join('transport_bill', 'transport_bill.transport_id', '=', 'bill.bill_status')
                        ->get();
        $count = DB::table('bill')->get()->count();
        $countTotal = DB::table('bill')->get()->count();
        switch ($status) {
            case 0:
                $status_name = "tất cả";
                 $count = DB::table('bill')->where('bill.bill_date', $date)->get()->count();
                $list_bill = DB::table('bill')->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
                        ->join('payment_bill', 'payment_bill.payment_id', '=', 'bill.payment_id')
                        ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
                        ->join('transport_bill', 'transport_bill.transport_id', '=', 'bill.bill_status')
                        ->where('bill.bill_date', $date)
                        ->get();
                break;

            case $status:
                $status_name = DB::table('transport_bill')->where('transport_id',$status)->value('transport_name');
                $count = DB::table('bill')->where('bill.bill_date', $date)->where('bill.bill_status', $status)->get()->count();
                $list_bill = DB::table('bill')->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
                ->join('payment_bill', 'payment_bill.payment_id', '=', 'bill.payment_id')
                ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
                ->join('transport_bill', 'transport_bill.transport_id', '=', 'bill.bill_status')
                ->where('bill.bill_date', $date)
                ->where('bill.bill_status', $status)
                ->get();
                break;

            default:

        }
        return view('backend.pages.bill_status.search')
                    ->with('list', $list_bill)
                    ->with('date', $date)
                    ->with('status_name', $status_name)
                    ->with('count', $count)
                    ->with('countTotal', $countTotal);
    }

}
