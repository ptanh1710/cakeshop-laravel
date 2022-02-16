@extends('backend.layout')

@section('title', 'Thêm nhân viên mới')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Thêm nhân viên mới
        </h3>
        <div class="row p-2">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @php
                    $message = session()->get('message');
                    if($message){
                        echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                        $message = session()->put('message',null);
                    }
                @endphp
                <form action="{{URL::TO('/admin/save_admin')}}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nameId" class="form-label fw-bold">Tên nhân viên</label>
                        <input type="text" name="admin_name" placeholder="Nhập tên nhân viên" class="form-control" id="nameId" required>
                    </div>

                    <div class="mb-3">
                        <label for="mailId" class="form-label fw-bold">Gmail</label>
                        <input type="email" name="admin_gmail" placeholder="Nhập gmail" class="form-control" id="mailId" required>
                    </div>

                    <div class="mb-3">
                        <label for="passId" class="form-label fw-bold">Mật khẩu</label>
                        <input type="password" name="admin_password" placeholder="Nhập mật khẩu" class="form-control" id="passId" required>
                    </div>

                    <div class="mb-3">
                        <label for="phoneId" class="form-label fw-bold">Số điện thoại</label>
                        <input type="number" name="admin_phone" placeholder="Nhập số điện thoại" class="form-control" id="phoneId" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Chức vụ / chức danh</label>
                        <select id="inputState" class="form-select" name="role_id">
                            @foreach ($role as $r)
                                <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-plus-square me-2"></i> Thêm nhân viên
                        </button>

                        <a href="{{URL::TO('/admin/all_admin')}}" class="btn btn-info">
                            <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách nhân viên
                        </a>
                    </div>
                  </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
@endsection
