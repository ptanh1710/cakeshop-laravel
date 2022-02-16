<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class ProviderController extends Controller
{
    // all list provider product: cake/bakery
    public function all_provider() {
        $all = DB::table('provider_product')->get();
        $page = DB::table('provider_product')->orderBy('provider_status','asc')->paginate(5);
        $acitve = DB::table('provider_product')->where('provider_status','=',1)->get()->count();
        $unacitve = DB::table('provider_product')->where('provider_status','=',0)->get()->count();
        $count = $all->count();
        return view('backend.pages.provider.list')->with('provider_id',$page)
                                                ->with('count',$count)
                                                ->with('acitve', $acitve)
                                                ->with('unacitve', $unacitve);
    }

    // add provider product: cake/bakery
    public function add_provider () {
        return view('backend.pages.provider.add');

    }

    // save provider product: cake/bakery
    public function save_provider(Request $request) {
        $data = array();

        $data['provider_name'] = $request->provider_name;
        $data['provider_phone'] = $request->provider_phone;
        $data['provider_gmail'] = $request->provider_gmail;
        $data['provider_address'] = $request->provider_address;
        $data['provider_status'] = $request->provider_status;

        $name = $request->provider_name;
        $checkName = DB::table('provider_product')->where('provider_name', $name)->get();
        $count = $checkName->count();
        if($count > 0){
            $request->session()->put('message','Thêm nhà cung cấp bánh thất bại - Đã có loại '.$name.' này');
            return redirect('/admin/add_provider');
        }
        else {
            DB::table('provider_product')->insert($data);
            $request->session()->put('message','Thêm nhà cung cấp thành công');
            return redirect('/admin/all_provider');
        }
    }

    // edit/detail provider product: cake/bakery
    public function edit_provider($id) {
        $name = DB::table('provider_product')->where('provider_id', $id)->value('provider_name');
        $detail = DB::table('provider_product')->where('provider_id', $id)->get();
        $manager = view('backend.pages.provider.edit')->with('provider', $detail)->with('name_id', $name);
        return view('backend.layout')->with('backend.pages.provider.edit', $manager );

    }

    // update provider product: cake/bakery
    public function update_provider(Request $request, $id){
        $data = array();
        $data['provider_name'] = $request->provider_name;
        $data['provider_phone'] = $request->provider_phone;
        $data['provider_gmail'] = $request->provider_gmail;
        $data['provider_address'] = $request->provider_address;

        $name = $request->provider_name;

        DB::table('provider_product')->where('provider_id',$id)->update($data);
        $request->session()->put('message','Cập nhật thông tin nhà cung cấp '.$name.' thành công');
        return redirect('/admin/all_provider');
    }

    // delete provider product: cake/bakery
    public function delete_provider($id, Request $request) {
        $name = DB::table('provider_product')->where('provider_id', $id)->value('provider_name');
        $checkCateProduct = DB::table('product')->where('provider_id', $id)->get();
        $count = $checkCateProduct->count();
        if($count > 0) {
            $request->session()->put('message','Không thể xoá - Có '.$count.' sản phẩm thuộc nhà cung cấp '.$name);
            return redirect('/admin/all_provider');
        }
        else {
            DB::table('provider_product')->where('provider_id',$id)->delete();
            $request->session()->put('message','Xoá nhà cung cấp '.$name.' thành công');
            return redirect('/admin/all_provider');
        }

    }

    // find product from provider_id -- Show cake/bakery
    public function show_provider_by_id($id) {
        $list_product = DB::table('product')->where('provider_id',$id)->get();
        $page = DB::table('product')->where('provider_id',$id)->get();
        $name = DB::table('provider_product')->where('provider_id', $id)->value('provider_name');
        $count = $list_product->count();
        if($count > 0) {
            $manager = view('backend.pages.provider.show')->with('list_product', $page)
                                                        ->with('name_id', $name)
                                                        ->with('count', $count);
            return view('backend.layout')->with('backend.pages.provider.show', $manager );
        }
        else {
            session()->put('message','Không có sản phẩm thuộc nhà cung cấp '.$name);
            return redirect('/admin/all_provider');
        }

    }

    // active provider product: cake/bakery
    public function active_prv($id) {
        $name = DB::table('provider_product')->where('provider_id', $id)->value('provider_name');
        DB::table('provider_product')->where('provider_id', $id)->update(['provider_status' =>1]);
        Session()->put('message', 'Thay đổi trạng thái nhà cung cấp '.$name.' (Mã:'.$id.')'.' thành công');
        return redirect('/admin/all_provider');
    }

    // unactive provider product: cake/bakery
    public function unactive_prv($id) {
        $name = DB::table('provider_product')->where('provider_id', $id)->value('provider_name');
        DB::table('provider_product')->where('provider_id', $id)->update(['provider_status' =>0]);
        Session()->put('message', 'Thay đổi trạng thái nhà cung cấp '.$name.' (Mã: '.$id.')'.' thành công');
        return redirect('/admin/all_provider');
    }

    // Send status => show product
    public function show_provider_status(Request $request){
        $valueId = $request->provider_status;
        $count = DB::table('provider_product')->where('provider_status', $valueId)->get()->count();
        $countTotal = DB::table('provider_product')->get()->count();
        switch($valueId) {
            case '0':
                $status_name = 'chưa kích hoạt';
                $data = DB::table('provider_product')->where('provider_status', $valueId)->get();
                break;

            case '1':
                $status_name = 'đã kích hoạt';
                $data = DB::table('provider_product')->where('provider_status', $valueId)->get();
                break;

            default:
                return redirect('/admin/all_provider');

        }

        return view('backend.pages.provider.search')
                ->with('provider_id',$data)
                ->with('count',$count)
                ->with('countTotal',$countTotal)
                ->with('status_name',$status_name);


    }
}
