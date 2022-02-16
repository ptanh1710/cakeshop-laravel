<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
session_start();

class ProductController extends Controller
{
    // all list product: cake/bakery
    public function all_product() {
        $all = DB::table('product')->orderBy('product_status','asc')->get();
        $page = DB::table('product')->orderBy('product_status','asc')->paginate(5);
        $acitve = DB::table('product')->where('product_status','=',1)->get()->count();
        $unacitve = DB::table('product')->where('product_status','=',0)->get()->count();
        $count = $all->count();
        return view('backend.pages.product.list')->with('product_id',$page)
                                                ->with('count',$count)
                                                ->with('acitve', $acitve)
                                                ->with('unacitve', $unacitve);
    }

    // add product: cake/bakery
    public function add_product () {
        $cate = DB::table('category_product')->get();
        $provider = DB::table('provider_product')->get();
        return view('backend.pages.product.add')->with('category', $cate)->with('provider', $provider);

    }

    // save product: cake/bakery
    public function save_product(Request $request) {

        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $hour = Carbon::now('Asia/Ho_Chi_Minh')->hour; //giờ
        $minute = Carbon::now('Asia/Ho_Chi_Minh')->minute; //phút
        $second = Carbon::now('Asia/Ho_Chi_Minh')->second; //giây
        $time = $date->toDateString().'_'.$hour.'-'.$minute.'-'.$second;

        $data = array();

        $data['product_name'] = $request->product_name;
        $data['product_amount'] = $request->product_amount;
        $data['product_price'] = $request->product_price;
        $data['product_date'] =  $date->toDateString();
        $data['product_material'] = $request->product_material;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->category_id;
        $data['provider_id'] = $request->provider_id;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_img');

        $name = $request->product_name;
        $checkName = DB::table('product')->where('product_name', $name)->get();
        $count = $checkName->count();

        if($count > 0){
            $request->session()->put('message','Thêm tên loại bánh thất bại - Đã có loại '.$name.' này');
            return redirect('/admin/add_product');
        }
        else {
            if($get_image){
                $get_name = $get_image->getClientOriginalName();
                $name_img = current(explode('.', $get_name));
                $new_image = $name_img.'_'.$time.'.'.$get_image->getClientOriginalExtension();

                $get_image->move('public/uploads/product',$new_image);

                $data['product_img'] = $new_image;

                DB::table('product')->insert($data);
                $request->session()->put('message','Thêm sản phẩm thành công');
                return redirect('/admin/all_product');
            }
            else {
                $data['product_img'] = '';
                DB::table('product')->insert($data);
                $request->session()->put('message', 'Thêm sản phẩm thành công');
                return redirect('/admin/all_product');
            }
        }
    }

    // edit/detail product: cake/bakery
    public function edit_product($id) {
        $name = DB::table('product')->where('product_id', $id)->value('product_name');
        $detail = DB::table('product')->where('product_id', $id)->get();
        $category_id = DB::table('category_product')->get();
        $provider_id = DB::table('provider_product')->get();
        $manager = view('backend.pages.product.edit')->with('product', $detail)->with('name_id', $name)
        ->with('category',$category_id)->with('provider', $provider_id);
        return view('backend.layout')->with('backend.pages.product.edit', $manager );

    }

    // update product: cake/bakery
    public function update_product(Request $request, $id){
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $hour = Carbon::now('Asia/Ho_Chi_Minh')->hour; //giờ
        $minute = Carbon::now('Asia/Ho_Chi_Minh')->minute; //phút
        $second = Carbon::now('Asia/Ho_Chi_Minh')->second; //giây
        $time = $date->toDateString().'_'.$hour.'-'.$minute.'-'.$second;

        $data = array();

        $data['product_name'] = $request->product_name;
        $data['product_amount'] = $request->product_amount;
        $data['product_price'] = $request->product_price;
        $data['product_date'] =  $date->toDateString();
        $data['product_material'] = $request->product_material;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->category_id;
        $data['provider_id'] = $request->provider_id;

        $get_image = $request->file('product_img');

        if($get_image){
            $get_name = $get_image->getClientOriginalName();
            $name_img = current(explode('.', $get_name));
            $new_image = $name_img.'_'.$time.'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/product',$new_image);

            $data['product_img'] = $new_image;

            DB::table('product')->where('product_id', $id)->update($data);
            $request->session()->put('message','Cập nhật thông tin sản phẩm thành công');
            return redirect('/admin/all_product');
        }

        DB::table('product')->where('product_id', $id)->update($data);
        $request->session()->put('message', 'Cập nhật thông tin sản phẩm thành công');
        return redirect('/admin/all_product');

    }

    // delete product: cake/bakery
    public function delete_product($id, Request $request) {
        $name = DB::table('product')->where('product_id', $id)->value('product_name');
        $checkCateProduct = DB::table('bill_detail')->where('product_id', $id)->get();
        $count = $checkCateProduct->count();
        if($count > 0) {
            $request->session()->put('message','Không thể xoá - Có '.$count.' hoá đơn thuộc loại '.$name);
            return redirect('/admin/all_product');
        }
        else {
            DB::table('product_product')->where('product_id',$id)->delete();
            $request->session()->put('message','Xoá loại '.$name.' thành công');
            return redirect('/admin/all_product');
        }

    }

    // active product: cake/bakery
    public function active_prc($id) {
        $name = DB::table('product')->where('product_id', $id)->value('product_name');
        DB::table('product')->where('product_id', $id)->update(['product_status' =>1]);
        Session()->put('message', 'Thay đổi trạng thái loại '.$name.' (Mã:'.$id.')'.' thành công');
        return redirect('/admin/all_product');
    }

    // unactive product: cake/bakery
    public function unactive_prc($id) {
        $name = DB::table('product')->where('product_id', $id)->value('product_name');
        DB::table('product')->where('product_id', $id)->update(['product_status' =>0]);
        Session()->put('message', 'Thay đổi trạng thái loại '.$name.' (Mã: '.$id.')'.' thành công');
        return redirect('/admin/all_product');
    }

    // Send status, date => show product
    public function show_product_status(Request $request) {
        $date = $request->product_date;
        $status = $request->product_status;
        $count = DB::table('product')->where('product_date', $date)->where('product_status', $status)->get()->count();
        $countTotal = DB::table('product')->get()->count();
        switch ($status) {
            case 0:
                $status_name = 'chưa kích hoạt';
                $data = DB::table('product')->where('product_date', $date)->where('product_status', $status)->get();
                break;

            case 1:
                $status_name = 'đã kích hoạt';
                $data = DB::table('product')->where('product_date', $date)->where('product_status', $status)->get();
                break;

            default:
                $status_name = '';
                $count = DB::table('product')->where('product_date', $date)->get()->count();
                $data = DB::table('product')->where('product_date', $date)->get();

        }

        return view('backend.pages.product.search')
                        ->with('product_id',$data)
                        ->with('count',$count)
                        ->with('countTotal',$countTotal)
                        ->with('status_name',$status_name)
                        ->with('dateSelect',$date);

    }
}
