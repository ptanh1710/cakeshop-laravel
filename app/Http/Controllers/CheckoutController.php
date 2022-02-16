<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use Carbon\Carbon;
class CheckoutController extends Controller
{
    public function login_checkout() {
        return view('frontend/pages.checkout.login_checkout');
    }
    public function register_customer(Request $request) {
        $data = array();
        $data['consumer_name'] = $request->consumer_name;
        $data['consumer_gmail'] = $request->consumer_gmail;
        $data['consumer_password'] = md5($request->consumer_password);
        $gmail = $request->consumer_gmail;
        $message = "*Email này đã tồn tại - Hãy đăng ký lại";
        $checkmail= DB::table('consumer')->where('consumer_gmail',$gmail)->get()->count();
        if($checkmail>0){
            $request->session()->put('message',$message);
            return Redirect::to('/login-checkout');
        }
        else {
            $customer_id = DB::table('consumer')->insertGetId($data);
            Session::put('consumer_id',$customer_id);
            Session::put('consumer_name',$request->consumer_name);
            return Redirect::to('/home');
        }
    }
    public function checkout() {
        //Table Payment
        $all_payment = DB::table('payment_bill')->get();
        $count = Cart::count();
        // dd($count);
        if($count==0){
            return Redirect::to('/home');
        }
        else {
            return view('frontend/pages.checkout.checkout')->with('all_payment',$all_payment);
        }
    }
    public function order_place(Request $request) {
        //Table Shipping
        $data_shipping = array();
        $data_shipping ['shipping_name'] = $request->shipping_name;
        $data_shipping ['shipping_phone'] = $request->shipping_phone;
        $data_shipping ['shipping_gmail'] = $request->shipping_gmail;
        $data_shipping ['shipping_address'] = $request->shipping_address;
        $data_shipping ['shipping_note'] = $request->shipping_note;
        $shipping_id = DB::table('shipping_bill')->insertGetId($data_shipping);
        //Table payment
        $paymentId = $request->paymentId_hidden;
        //Table Bill
        $data_bill = array();
        $data_bill['bill_date'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data_bill['bill_totalprice'] = Cart::total();
        $data_bill['bill_status'] = '2';
        $data_bill['consumer_id'] = $request->session()->get('consumer_id');
        $data_bill['shipping_id'] = $shipping_id;
        $data_bill['payment_id'] = $paymentId;
        $bill_id = DB::table('bill')->insertGetId($data_bill);
        //Talbe Bill Details
        $content = Cart::Content();
        foreach($content as $cart_ct) {
            $data_bill_details['bill_id'] = $bill_id;
            $data_bill_details['product_id'] = $cart_ct->id;
            $data_bill_details['billdetail_name'] = $cart_ct->name;
            $data_bill_details['billdetail_amount'] = $cart_ct->qty;
            $data_bill_details['billdetail_price'] = $cart_ct->price;
            DB::table('bill_detail')->insert($data_bill_details);
        }
        // $message = "Thanh toán thành công";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        Cart::destroy();
        return Redirect::to('/home');

    }
    public function logout_checkout() {
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request) {
        $email = $request->account_gmail;
        $password = md5($request->account_password);
        $message = "Đăng nhập thành công";
        $result = DB::table('consumer')->where('consumer_gmail', $email)->where('consumer_password', $password)->first();
        if($result) {
            echo "<script type='text/javascript'>alert('$message');</script>";
            Session::put('consumer_id',$result->consumer_id);
            Session::put('consumer_name',$result->consumer_name);
            return Redirect::to('/home');
        }
        else{
            echo "<script type='text/javascript'>alert('$message');</script>";
            return Redirect::to('/login-checkout');
        }
    }
}
