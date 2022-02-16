<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class CategoryController extends Controller
{
    // all list category product: cake/bakery
    public function all_category() {
        $all = DB::table('category_product')->get();
        $page = DB::table('category_product')->orderBy('category_status','asc')->paginate(5);
        $cate_acitve = DB::table('category_product')->where('category_status','=',1)->get()->count();
        $cate_unacitve = DB::table('category_product')->where('category_status','=',0)->get()->count();
        $count = $all->count();
        return view('backend.pages.category.list')->with('cate',$page)
                                                ->with('count',$count)
                                                ->with('cate_acitve', $cate_acitve)
                                                ->with('cate_unacitve', $cate_unacitve);
        // dd($page);
    }

    // add category product: cake/bakery
    public function add_category () {
        return view('backend.pages.category.add');

    }

    // save category product: cake/bakery
    public function save_category(Request $request) {
        $data = array();

        $data['category_name'] = $request->category_name;
        $data['category_note'] = $request->category_note;
        $data['category_status'] = $request->category_status;

        $name = $request->category_name;
        $checkName = DB::table('category_product')->where('category_name', $name)->get();
        $count = $checkName->count();
        if($count > 0){
            $request->session()->put('message','Thêm tên loại bánh thất bại - Đã có loại '.$name.' này');
            return redirect('/admin/add_category');
        }
        else {
            DB::table('category_product')->insert($data);
            $request->session()->put('message','Thêm danh mục loại bánh thành công');
            return redirect('/admin/all_category');
        }
    }

    // edit/detail category product: cake/bakery
    public function edit_category($id) {
        $name = DB::table('category_product')->where('category_id', $id)->value('category_name');
        $detail = DB::table('category_product')->where('category_id', $id)->get();
        $manager = view('backend.pages.category.edit')->with('category', $detail)->with('cate_name', $name);
        return view('backend.layout')->with('backend.pages.category.edit', $manager );

    }

    // update category product: cake/bakery
    public function update_category(Request $request, $id){
        $data = array();

        $data['category_name'] = $request->category_name;
        $data['category_note'] = $request->category_note;

        $name = $request->category_name;
        // $checkName = DB::table('category_product')->where('category_name', $name)->get();

        DB::table('category_product')->where('category_id',$id)->update($data);
        $request->session()->put('message','Cập nhật danh mục loại bánh '.$name.' thành công');
        return redirect('/admin/all_category');


    }

    // delete category product: cake/bakery
    public function delete_category($id, Request $request) {
        $name = DB::table('category_product')->where('category_id', $id)->value('category_name');
        $checkCateProduct = DB::table('product')->where('category_id', $id)->get();
        $count = $checkCateProduct->count();
        if($count > 0) {
            $request->session()->put('message','Không thể xoá - Có '.$count.' sản phẩm thuộc loại '.$name);
            return redirect('/admin/all_category');
        }
        else {
            DB::table('category_product')->where('category_id',$id)->delete();
            $request->session()->put('message','Xoá loại '.$name.' thành công');
            return redirect('/admin/all_category');
        }

    }

    // find product from category_id -- Show cake/bakery
    public function show_category_by_id($id) {
        $list_product = DB::table('product')->where('category_id',$id)->get();
        $page = DB::table('product')->where('category_id',$id)->get();
        $name = DB::table('category_product')->where('category_id', $id)->value('category_name');
        $count = $list_product->count();
        if($count >0){
            $manager = view('backend.pages.category.show')->with('list_product', $page)
                                                        ->with('cate_name', $name)
                                                        ->with('count', $count);
            return view('backend.layout')->with('backend.pages.category.show', $manager );
        }
        else {
            session()->put('message','Không có sản phẩm thuộc loại '.$name);
            return redirect('/admin/all_category');
        }


    }

    // active category product: cake/bakery
    public function active_cate($id) {
        $name = DB::table('category_product')->where('category_id', $id)->value('category_name');
        DB::table('category_product')->where('category_id', $id)->update(['category_status' =>1]);
        Session()->put('message', 'Thay đổi trạng thái loại '.$name.' (Mã:'.$id.')'.' thành công');
        return redirect('/admin/all_category');
        // dd('adas');

    }

    // unactive category product: cake/bakery
    public function unactive_cate($id) {
        $name = DB::table('category_product')->where('category_id', $id)->value('category_name');
        DB::table('category_product')->where('category_id', $id)->update(['category_status' =>0]);
        Session()->put('message', 'Thay đổi trạng thái loại '.$name.' (Mã: '.$id.')'.' thành công');
        return redirect('/admin/all_category');
        // dd('adas');

    }

    // Send status => show product
    public function show_category_status(Request $request){
        $valueId = $request->category_status;
        $count = DB::table('category_product')->where('category_status', $valueId)->get()->count();
        $countTotal = DB::table('category_product')->get()->count();
        switch($valueId) {
            case '0':
                $status_name = 'chưa kích hoạt';
                $data = DB::table('category_product')->where('category_status', $valueId)->get();
                break;

            case '1':
                $status_name = 'đã kích hoạt';
                $data = DB::table('category_product')->where('category_status', $valueId)->get();
                break;

            default:
                return redirect('/admin/all_category');

        }

        return view('backend.pages.category.search')
                ->with('cate',$data)
                ->with('count',$count)
                ->with('countTotal',$countTotal)
                ->with('status_name',$status_name);


    }
}
