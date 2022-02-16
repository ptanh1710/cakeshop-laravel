@extends('backend.layout')

@section('title', 'Thêm nhà cung cấp')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Thêm Nhà cung cấp
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
                <form action="{{URL::TO('/admin/save_provider')}}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                      <label for="nameId" class="form-label fw-bold">Tên loại bánh</label>
                      <input type="text" name="provider_name" placeholder="Nhập tên loại bánh" class="form-control" id="nameId" required>
                    </div>

                    <div class="mb-3">
                        <label for="phoneId" class="form-label fw-bold">Số điện thoại</label>
                        <input type="number" name="provider_phone" placeholder="Nhập số điện thoại" class="form-control" id="phoneId" required>
                    </div>

                    <div class="mb-3">
                        <label for="mailId" class="form-label fw-bold">Gmail </label>
                        <input type="email" name="provider_gmail" placeholder="Nhập gmail" class="form-control" id="mailId" required>
                    </div>

                    <div class="mb-3">
                        <label for="addressId" class="form-label fw-bold">Địa chỉ </label>
                        <input type="text" name="provider_address" placeholder="Nhập địa chỉ" class="form-control" id="addressId" required>
                    </div>

                    <div class="mb-3">
                        <label for="noteId" class="form-label fw-bold">Ghi chú (nếu có)</label>
                        <textarea type="text" rows="4" name="provider_note" class="form-control" id="noteId" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="noteId" class="form-label fw-bold">Trạng thái</label>
                        <select id="inputState" class="form-select" name="provider_status">
                            <option selected value="0">Không kích hoạt</option>
                            <option value="1">Kích hoạt</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-plus-square me-2"></i> Thêm nhà cung cấp
                    </button>

                    <a href="{{URL::TO('/admin/all_provider')}}" class="btn btn-info">
                        <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách nhà cung cấp
                    </a>
                  </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
@endsection
