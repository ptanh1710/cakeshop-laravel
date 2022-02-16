<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProviderController extends Controller
{
    public function index() {
        $all_provider = DB::table('provider_product')->where('provider_status',1)->orderby('provider_id','desc')->get();
        return view('frontend/pages.provider.provider')->with('all_provider',$all_provider);
    }
}
