@extends('backend.layout')

@section('title', 'Thông tin nhân viên: '.Auth::user()->admin_name)

@section('content')
    @php
        $name = Auth::user()->admin_name;
        $mail = Auth::user()->admin_gmail;
        $password = Auth::user()->admin_password;
        $role = Auth::user()->role_id;
        $phone = Auth::user()->admin_phone;
    @endphp
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Thông tin nhân viên: {{$name}}
        </h3>
        <div class="row p-2">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                {{-- <form action="{{URL::TO('/save_admin')}}" method="post">
                    {{ csrf_field() }} --}}
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="nameId" class="form-label fw-bold">Tên nhân viên</label>
                                <input type="text" name="admin_name" class="form-control" id="nameId" readonly value="{{$name}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="role_id" class="form-label fw-bold">Chức vụ</label>

                                @switch($role)
                                    @case($role == 1)
                                        <input type="text" name="role_id" class="form-control" id="role_id" readonly value="admin">
                                        @break
                                    @case($role == 2)
                                        <input type="text" name="role_id" class="form-control" id="role_id" readonly value="shipper">
                                        @break
                                    @case($role == 3)
                                        <input type="text" name="role_id" class="form-control" id="role_id" readonly value="user">
                                        @break
                                    @default
                                        <input type="text" name="role_id" class="form-control" id="role_id" readonly value="Không có quyền hạn">

                                @endswitch
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="mailId" class="form-label fw-bold">Gmail</label>
                        <input type="email" name="admin_gmail" class="form-control" id="mailId" readonly value="{{$mail}}">
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="passId" class="form-label fw-bold">Mật khẩu</label>
                                <input type="password" name="admin_password" class="form-control" id="passId" readonly value="{{$password}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phoneId" class="form-label fw-bold">Số điện thoại</label>
                                <input type="number" name="admin_phone" class="form-control" id="phoneId" readonly value="{{$phone}}">
                            </div>
                        </div>

                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label fw-bold">Chức vụ / chức danh</label>
                        <select id="inputState" class="form-select" name="role_id">
                            @foreach ($role as $r)
                                <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    {{-- <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-plus-square me-2"></i> Thêm nhân viên
                        </button>

                        <a href="{{URL::TO('/all_admin')}}" class="btn btn-info">
                            <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách nhân viên
                        </a>
                    </div> --}}
                  {{-- </form> --}}
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
@endsection
