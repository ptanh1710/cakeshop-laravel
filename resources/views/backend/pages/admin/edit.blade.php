@extends('backend.layout')

@section('title', 'NV: '.$name_id)


@section('content')
    @foreach ($admin as $key => $detail)
        <div class="mt-2 border bg-light">
            <h3 class="text-center border-bottom p-3 text-uppercase">
                Thông tin nhân viên {{$detail->admin_name}}
            </h3>
            @php
                $message = session()->get('message');
                if($message){
                    echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                    $message = session()->put('message',null);
                }
            @endphp
            <div class="row p-2">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form action="{{URL::TO('/admin/update_admin/'.$detail->admin_id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="nameId" class="form-label fw-bold">Tên nhân viên</label>
                            <input type="text" name="admin_name" placeholder="Nhập tên nhân viên" class="form-control" id="nameId" required value="{{$detail->admin_name}}">
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="mailId" class="form-label fw-bold">Gmail</label>
                                    <input type="email" readonly name="admin_gmail" placeholder="Nhập gmail" class="form-control" id="mailId" required value="{{$detail->admin_gmail}}">
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label fw-bold">Chức vụ / chức danh</label>
                                    <select id="inputState" class="form-select" name="role_id">
                                        @foreach ($role as $r)
                                            @if($detail->role_id == $r->role_id) {
                                                <option selected value="{{$r->role_id}}">{{$r->role_name}}</option>
                                            }
                                            @else {
                                                <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                                            }
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="passId" class="form-label fw-bold">Mật khẩu</label>
                            <input type="password" name="admin_password" placeholder="Nhập mật khẩu" class="form-control" id="passId" readonly required value="{{$detail->admin_password}}">
                        </div>

                        <div class="mb-3">
                            <label for="phoneId" class="form-label fw-bold">Số điện thoại</label>
                            <input type="number" name="admin_phone" placeholder="Nhập số điện thoại" class="form-control" id="phoneId" required value="{{$detail->admin_phone}}">
                        </div>


                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-pen-square me-2"></i> Cập nhật thông tin nhân viên
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
    @endforeach
@endsection
