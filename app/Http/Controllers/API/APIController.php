<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    //
    public function read(Request $request) {
        $db = DB::table('product')
                ->join('category_product', 'category_product.category_id', '=', 'product.category_id')
                ->join('provider_product', 'provider_product.provider_id', '=', 'product.provider_id')
                ->get();
        // dd($db);
        return $db;
    }
}
