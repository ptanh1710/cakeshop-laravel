@extends('backend.layout')

@section('title', 'Thêm khách hàng mới')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Thêm khách hàng mới
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
                <form action="{{URL::TO('/admin/save_consumer')}}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nameId" class="form-label fw-bold">Tên khách hàng</label>
                        <input type="text" name="consumer_name" placeholder="Nhập tên khách hàng" class="form-control" id="nameId" required>
                    </div>

                    <div class="mb-3">
                        <label for="mailId" class="form-label fw-bold">Gmail</label>
                        <input type="email" name="consumer_gmail" placeholder="Nhập gmail" class="form-control" id="mailId" required>
                    </div>

                    <div class="mb-3">
                        <label for="passId" class="form-label fw-bold">Mật khẩu</label>
                        <input type="password" name="consumer_password" placeholder="Nhập mật khẩu" class="form-control" id="passId" required>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="phoneId" class="form-label fw-bold">Số điện thoại</label>
                                <input type="number" name="consumer_phone" placeholder="Nhập số điện thoại" class="form-control" id="phoneId" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="daybirth" class="form-label fw-bold">Ngày sinh</label>
                                <input type="date" name="consumer_daybirth" class="form-control" id="daybirth" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="addressId" class="form-label fw-bold">Đại chỉ</label>
                        <input type="text" name="consumer_address" placeholder="Nhập địa chỉ" class="form-control" id="addressId">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-plus-square me-2"></i> Thêm khách hàng
                        </button>

                        <a href="{{URL::TO('/admin/all_consumer')}}" class="btn btn-info">
                            <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách khách hàng
                        </a>
                    </div>
                  </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
@endsection
