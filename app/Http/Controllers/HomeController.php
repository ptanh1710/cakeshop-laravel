<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){

        $all_product = DB::table('product')->where('product_status',1)->get();

        return view('frontend/pages.home')->with('all_product',$all_product);
    }
}
