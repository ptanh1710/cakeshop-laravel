<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    //Fuction Fronend
    public function show_category_product($category_id) {
        // $category_product = DB::table('category_product')
        // ->join('product','category_product.category_id=product.category_id')
        // ->where('category_status',1)
        // ->orderby('category_id','desc')->get();
        $category_product = DB::select('select cp.category_name, cp.category_id, COUNT(p.product_id) as Tongsoluong
                                        from product p, category_product cp
                                        where p.category_id = cp.category_id and category_status = 1
                                        group by cp.category_name, cp.category_id');

        $category_by_id = DB::table('product')
        ->join('category_product','product.category_id','=','category_product.category_id')
        ->where('product.category_id',$category_id)->get();

        $category_name = DB::table('category_product')
        ->where('category_product.category_id',$category_id)->limit(1)->get();

        $selling_product = DB::select('SELECT p.product_id, p.product_name,p.product_price,p.product_img, SUM(bd.billdetail_amount) as SpBanChay
        From product p, bill_detail bd
        Where p.product_id = bd.product_id
        Group by p.product_name,p.product_price,p.product_img, p.product_id
        Order by SpBanChay DESC
        Limit 4');

        return view('frontend/pages.category.showcategory')
        ->with('category',$category_product)
        ->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name)
        ->with('selling_product',$selling_product);
    }
}
