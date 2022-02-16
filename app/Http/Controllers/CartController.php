<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request) {

        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('product')->where('product_id', $productId)->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        // Cart::destroy();
        $data['id'] = $productId;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_img;
        Cart::add($data);
        Cart::setGlobalTax(10);
        return Redirect::to('/show-cart');
    }
    public function add_cart(Request $request) {


        $productId = $request->productid_hidden;

        $product_info = DB::table('product')->where('product_id', $productId)->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        // Cart::destroy();
        $data_add['id'] = $productId;
        $data_add['qty'] = 1;
        $data_add['name'] = $product_info->product_name;
        $data_add['price'] = $product_info->product_price;
        $data_add['weight'] = '123';
        $data_add['options']['image'] = $product_info->product_img;
        Cart::add($data_add);
        Cart::setGlobalTax(10);
        return Redirect::to('/show-cart');
    }
    public function show_cart(){
        return view('frontend/pages.cart.showcart');
    }
    public function delete_cart($rowId) {
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request) {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        $count = Cart::count();
        if($count==0){
            return Redirect::to('/product');
        }
        else
        {
            Cart::update($rowId,$qty);
            return Redirect::to('/show-cart');
        }
    }
}
