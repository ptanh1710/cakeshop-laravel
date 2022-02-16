<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use Carbon\Carbon;
class ContactController extends Controller
{
    public function show_contact() {
        return view('frontend/pages.contact.contact');
    }
    public function save_contact(Request $request) {
        $data_contact = array();
        $data_contact['contact_gmail']=$request->contact_gmail;
        $data_contact['contact_name']=$request->contact_name;
        $data_contact['contact_title']=$request->contact_title;
        $data_contact['contact_content']=$request->contact_content;
        $data_contact['contact_date']=Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('contact')->insert($data_contact);
        return Redirect::to('/home');
    }
}
