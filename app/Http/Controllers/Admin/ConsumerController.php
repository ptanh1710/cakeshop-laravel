<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class ConsumerController extends Controller
{
    // all list consumer: cake/bakery
    public function all_consumer() {
        $page = DB::table('consumer')->paginate(5);
        $count = DB::table('consumer')->get()->count();
        return view('backend.pages.consumer.list')->with('consumer_id',$page)
                                                ->with('count',$count);

        // dd($page);
    }

    // add admin: cake/bakery
    public function add_consumer () {
        return view('backend.pages.consumer.add');

    }

    // save admin: cake/bakery
    public function save_consumer(Request $request) {
        $data = array();

        $data['consumer_name'] = $request->consumer_name;
        $data['consumer_gmail'] = $request->consumer_gmail;
        $data['consumer_password'] = md5($request->consumer_password);
        $data['consumer_phone'] = $request->consumer_phone;
        $data['consumer_daybirth'] = $request->consumer_daybirth;

        $name = $request->consumer_name;
        $gmail = $request->consumer_gmail;
        $checkMail = DB::table('consumer')->where('consumer_gmail', $gmail)->get();
        $count = $checkMail->count();
        if($count > 0){
            $request->session()->put('message','Thêm khách hàng thất bại - Đã có mail '.$gmail.' này');
            return redirect('/admin/add_consumer');
        }
        else {
            DB::table('consumer')->insert($data);
            $request->session()->put('message','Thêm khách hàng '.$name.' thành công');
            return redirect('/admin/all_consumer');
        }
        // dd($data);
    }

    // edit/detail consumer: cake/bakery
    public function edit_consumer($id) {
        $name = DB::table('consumer')->where('consumer_id', $id)->value('consumer_name');
        $detail = DB::table('consumer')->where('consumer_id', $id)->get();
        $manager = view('backend.pages.consumer.edit')->with('consumer', $detail)
                                                    ->with('name_id', $name);
        return view('backend.layout')->with('backend.pages.consumer.edit', $manager );

    }

    // update consumer: cake/bakery
    public function update_consumer(Request $request, $id){
        $data = array();

        $data['consumer_name'] = $request->consumer_name;
        $data['consumer_phone'] = $request->consumer_phone;
        $data['consumer_daybirth'] = $request->consumer_daybirth;
        $data['consumer_address'] = $request->consumer_address;

        $name = $request->consumer_name;
        DB::table('consumer')->where('consumer_id',$id)->update($data);
        $request->session()->put('message','Cập nhật thông tin khách hàng '.$name.' thành công');
        return redirect('/admin/all_consumer');

    }

    // delete consumer: cake/bakery
    public function delete_consumer($id, Request $request) {
        $name = DB::table('consumer')->where('consumer_id', $id)->value('consumer_name');
        $checkBill = DB::table('bill')->where('consumer_id', $id)->get();
        $count = $checkBill->count();
        if($count > 0) {
            $request->session()->put('message','Không thể xoá - Có '.$count.' đơn hàng thuộc KH: '.$name);
            return redirect('/admin/all_consumer');
        }
        else {
            DB::table('consumer')->where('consumer_id',$id)->delete();
            $request->session()->put('message','Xoá khách hàng '.$name.' thành công');
            return redirect('/admin/all_consumer');
        }
    }

    public function search_bill_user($id){
        $list_bill = DB::table('bill')->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
                    ->join('payment_bill', 'payment_bill.payment_id', '=', 'bill.payment_id')
                    ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
                    ->join('transport_bill', 'transport_bill.transport_id', '=', 'bill.bill_status')
                    ->where('bill.consumer_id', $id)
                    ->get();
        $name = DB::table('consumer')->where('consumer_id', $id)->value('consumer_name');
        $count = DB::table('bill')->where('consumer_id', $id)->get()->count();

        // dd($list_bill);
        return view('backend.pages.consumer.search')
                ->with('list', $list_bill)
                ->with('count', $count)
                ->with('name', $name);
    }
}
