<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Admin;
session_start();

class AdminController extends Controller
{

    public function dashboard() {
        $countProduct = DB::table('product')->get()->count();
        $countAdmin = DB::table('admin')->get()->count();
        $countConsumer = DB::table('consumer')->get()->count();
        $countBill = DB::table('bill')->get()->count();
        $count = DB::table('bill')->get()->count();
        $list_bill = DB::table('bill')->join('consumer', 'consumer.consumer_id', '=', 'bill.consumer_id')
                    ->join('payment_bill', 'payment_bill.payment_id', '=', 'bill.payment_id')
                    ->join('shipping_bill', 'shipping_bill.shipping_id', '=', 'bill.shipping_id')
                    ->join('transport_bill', 'transport_bill.transport_id', '=', 'bill.bill_status')
                    ->orderBy('bill.bill_date','desc')
                    ->paginate(5);
        return view('backend.pages.home')
                    ->with('countProduct', $countProduct)
                    ->with('countAdmin', $countAdmin)
                    ->with('countConsumer', $countConsumer)
                    ->with('countBill', $countBill)
                    ->with('count', $count)
                    ->with('list', $list_bill);
    }

    public function admin(){
        return view('backend.pages.login');
    }

    public function admin_login(Request $request){
        $data = ['admin_gmail' => $request->admin_gmail, 'admin_password' => $request->admin_password];
        if(Auth::attempt($data)){
            // dd(Auth::user());
            return redirect('/admin/dashboard');
        }
        else {
            $message = session()->put('message', 'Lỗi đăng nhập');
            return redirect('/admin')->with('message', $message);
        }
    }

    public function info() {

        return view('backend.pages.admin.info');
    }

    public function admin_logout(){
        Auth::logout();
        return redirect('/admin');
    }

     // all list admin: cake/bakery
     public function all_admin() {
        $all = DB::table('admin')->join('role', 'role.role_id','=', 'admin.role_id')->get();
        $page = DB::table('admin')->join('role', 'role.role_id','=', 'admin.role_id')->orderBy('admin.role_id','asc')->paginate(5);
        $count = $all->count();
        $role = DB::table('role')->get();
        $countRoleAdmin = DB::table('admin')->where('role_id','=',1)->get()->count();
        $countRoleUser = DB::table('admin')->where('role_id','=',2)->get()->count();
        $countRoleShipper = DB::table('admin')->where('role_id','=',3)->get()->count();
        return view('backend.pages.admin.list')->with('admin_id',$page)
                                                ->with('count',$count)
                                                ->with('countRoleAdmin',$countRoleAdmin)
                                                ->with('countRoleUser',$countRoleUser)
                                                ->with('countRoleShipper',$countRoleShipper)
                                                ->with('roleValue', $role);

        // dd($countRoleAdmin);
    }

    // add admin: cake/bakery
    public function add_admin () {
        $role = DB::table('role')->get();
        return view('backend.pages.admin.add')->with('role',$role);

    }

    // save admin: cake/bakery
    public function save_admin(Request $request) {
        $data = array();

        $data['admin_name'] = $request->admin_name;
        $data['admin_gmail'] = $request->admin_gmail;
        $data['admin_password'] = md5($request->admin_password);
        $data['admin_phone'] = $request->admin_phone;
        $data['role_id'] = $request->role_id;

        $name = $request->admin_name;
        $gmail = $request->admin_gmail;
        $checkName = DB::table('admin')->where('admin_gmail', $gmail)->get();
        $count = $checkName->count();
        if($count > 0){
            $request->session()->put('message','Thêm nhân viên thất bại - Đã có mail '.$gmail.' này');
            return redirect('/admin/add_admin');
        }
        else {
            DB::table('admin')->insert($data);
            $request->session()->put('message','Thêm nhân viên '.$name.' thành công');
            return redirect('/admin/all_admin');
        }
    }

    // edit/detail admin: cake/bakery
    public function edit_admin($id) {
        $name = DB::table('admin')->where('admin_id', $id)->value('admin_name');
        $detail = DB::table('admin')->where('admin_id', $id)->get();
        $role = DB::table('role')->get();
        $manager = view('backend.pages.admin.edit')->with('admin', $detail)
                                                    ->with('name_id', $name)
                                                    ->with('role',$role);
        return view('backend.layout')->with('backend.pages.admin.edit', $manager );

    }

    // update admin: cake/bakery
    public function update_admin(Request $request, $id){
        $data = array();

        $data['admin_name'] = $request->admin_name;
        $data['admin_phone'] = $request->admin_phone;
        $data['role_id'] = $request->role_id;

        $name = $request->admin_name;
        DB::table('admin')->where('admin_id',$id)->update($data);
        $request->session()->put('message','Cập nhật thông tin nhân viên '.$name.' thành công');
        return redirect('/admin/all_admin');

    }

    // delete admin: cake/bakery
    public function delete_admin($id, Request $request) {
        // $name = DB::table('category_product')->where('category_id', $id)->value('category_name');
        // $checkCateProduct = DB::table('product')->where('category_id', $id)->get();
        // $count = $checkCateProduct->count();
        // if($count > 0) {
        //     $request->session()->put('message','Không thể xoá - Có '.$count.' sản phẩm thuộc loại '.$name);
        //     return redirect('/admin/all_category');
        // }
        // else {
        //     DB::table('category_product')->where('category_id',$id)->delete();
        //     $request->session()->put('message','Xoá loại '.$name.' thành công');
        //     return redirect('/admin/all_category');
        // }
        $request->session()->put('message','Chưa cho xoá');
        return redirect('/admin/all_admin');
    }

    public function search_list_by_roleId(Request $request){
        $valueId = $request->role_id;
        $role = DB::table('role')->get();
        switch($valueId) {
            case '0':
                $data = DB::table('admin')->join('role', 'role.role_id','=', 'admin.role_id')->orderBy('admin.role_id','asc')->get();
                $roleName = 'all';
                break;

            default:
                $roleName = DB::table('role')->where('role_id', $valueId)->value('role_name');
                $data = DB::table('admin')->join('role', 'role.role_id','=', 'admin.role_id')->where('admin.role_id', $valueId)->orderBy('admin.role_id','asc')->get();
        }

        return view('backend.pages.admin.search')
                ->with('admin_id',$data)
                ->with('roleName', $roleName)
                ->with('roleValue', $role);
        ;
    }

}
