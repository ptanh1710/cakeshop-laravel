<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
{
    public function index(){
        //danh mục sản phẩm
        $category_product = DB::select('SELECT cp.category_name, cp.category_id, COUNT(p.product_id) as Tongsoluong
        From product p, category_product cp
        Where p.category_id = cp.category_id and category_status = 1
        Group by cp.category_name, cp.category_id');

        $all_product = DB::table('product')->where('product_status',1)->orderby('product_id','desc')->paginate(9);

        $selling_product = DB::select('SELECT p.product_id, p.product_name,p.product_price,p.product_img, SUM(bd.billdetail_amount) as SpBanChay
        From product p, bill_detail bd
        Where p.product_id = bd.product_id
        Group by p.product_name,p.product_price,p.product_img, p.product_id
        Order by SpBanChay DESC
        Limit 4');

        return view('frontend/pages.product')
        ->with('category',$category_product)
        ->with('all_product',$all_product)
        ->with('selling_product',$selling_product);
    }
    public function details_product($product_id) {
        // $details_product = DB::table('product')
        // ->join('category_product','category_product.category_id','=','product.category_id')
        // ->where('product.product_id',$product_id)->get();
        $details_product = DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('provider_product','provider_product.provider_id','=','product.provider_id')
        ->where('product.product_id',$product_id)->get();

        foreach($details_product as $key => $value) {
            $category_id = $value->category_id;
        }

        $related_product = DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->where('category_product.category_id',$category_id)->whereNotIn('product.product_id',[$product_id])->get();

        return view('frontend/pages.productdetails.showdetails')
        ->with('product_details',$details_product)
        ->with('relate',$related_product);
    }
    public function search(Request $request)
    {
        $category_product = DB::select('select cp.category_name, cp.category_id, COUNT(p.product_id) as Tongsoluong
        from product p, category_product cp
        where p.category_id = cp.category_id and category_status = 1
        group by cp.category_name, cp.category_id');

        $search_id = $request->search_submit;

        $search_product = DB::table('product')->where('product_name','like','%'.$search_id.'%')->get();

    $selling_product = DB::select('SELECT p.product_id, p.product_name,p.product_price,p.product_img, SUM(bd.billdetail_amount) as SpBanChay
        From product p, bill_detail bd
        Where p.product_id = bd.product_id
        Group by p.product_name,p.product_price,p.product_img, p.product_id
        Order by SpBanChay DESC
        Limit 4');

        return view('frontend/pages.search')
        ->with('category',$category_product)
        ->with('search_product',$search_product)
        ->with('selling_product',$selling_product);

    }
}
