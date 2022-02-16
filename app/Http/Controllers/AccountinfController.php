<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use News;
class AccountinfController extends Controller
{
    public function show_accountinf(Request $request) {
        $id = $request->session()->get('consumer_id');
        $all_consumer = DB::table('consumer')->where('consumer_id',$id)->get();
        return view('frontend/pages.accountinf.accountinf')->with('all_consumer',$all_consumer);
    }
    public function update_accountinf(Request $request) {
        $data_consumer = array();
        $data['consumer_name'] = $request->consumer_name;
        $data['consumer_gmail'] = $request->consumer_gmail;
        $data['consumer_phone'] = $request->consumer_phone;
        $data['consumer_daybirth'] = $request->consumer_daybirth;
        $data['consumer_address'] = $request->consumer_address;
        $id = $request->session()->get('consumer_id');
        DB::table('consumer')->where('consumer_id',$id)->update($data);
        $request->session()->put('message','Thông tin đã cập nhật');
        return Redirect::to('/accountinf');

    }
}
