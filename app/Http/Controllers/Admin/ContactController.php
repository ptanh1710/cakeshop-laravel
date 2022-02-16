<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class ContactController extends Controller
{
    public function list (){
        $count = DB::table('contact')->get()->count();
        $list = DB::table('contact')->orderBy('contact_date', 'desc')->paginate(5);
        return view('backend.pages.contact.list')->with('list', $list)-> with('count', $count);
    }

    public function detail ($id) {
        $name = DB::table('contact')->where('contact_id', $id)->value('contact_name');
        $detail = DB::table('contact')->where('contact_id', $id)->get();
        return view('backend.pages.contact.detail')->with('detail', $detail)->with('name', $name);
    }
}
