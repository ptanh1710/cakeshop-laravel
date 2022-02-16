@extends('backend.layout')

@section('title', 'Danh sách nhân viên')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách nhân viên
        </h3>
        @php
            $message = session()->get('message');
            if($message){
                echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                $message = session()->put('message',null);
            }
        @endphp
        <div class="row">
            <div class="col-lg-6  text-start">
                <p class="ms-3 fw-bold">Tổng số nhân viên hiện có: {{$count}}</p>
            </div>
            <div class="col-lg-6 text-center">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="ms-3 fw-bold">Admin: {{$countRoleAdmin}}</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="ms-3 fw-bold">User: {{$countRoleUser}}</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="ms-3 fw-bold">Shipper: {{$countRoleShipper}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-lg-6 text-start ">
                <a href="{{URL::TO('/admin/add_admin')}}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i> Thêm nhân viên mới
                </a>
            </div>
            <div class="col-lg-6 d-flex flex-row-reverse">
                <form action="{{URL::TO('/admin/search_list_by_roleId')}}" method="get">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="col">
                            <select class="form-select" name="role_id">
                                <option value="0">tất cả</option>
                                @foreach ($roleValue as $key => $value)
                                <option value="{{$value->role_id}}">{{$value->role_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" style="width: 120px;">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col">Mã loại</th>
                    <th scope="col">Tên nhân viên</th>
                    <th scope="col">Gmail</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admin_id as $key => $admin)
                    <tr class="text-center">
                        <th scope="row">
                            {{$admin->admin_id}}
                        </th>
                        <td class="text-start">{{$admin->admin_name}}</td>
                        <td class="text-start">
                            {{$admin->admin_gmail}}
                        </td>
                        <td>
                            {{$admin->role_name}}
                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/edit_admin/'.$admin->admin_id)}}" style="width: 105px;" class="btn btn-info" title="Chi tiết nhân viên {{$admin->admin_name}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                            <a href="{{URL::TO('/admin/delete_admin/'.$admin->admin_id)}}" style="width: 105px;" class="btn btn-danger"title=" Xoá nhân viên: {{$admin->admin_name}}" onclick="return confirm('Bạn có chắc muốn xoá nhân viên {{$admin->admin_name}} này không???')">
                                <i class="fas fa-trash-alt me-2"></i>Xoá
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-3">
            {{$admin_id->links()}}
        </div>
    </div>
@endsection

