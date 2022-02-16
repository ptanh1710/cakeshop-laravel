@extends('backend.layout')

@section('title', 'KH: '.$name_id)


@section('content')
    @foreach ($consumer as $key => $detail)
        <div class="mt-2 border bg-light">
            <h3 class="text-center border-bottom p-3 text-uppercase">
                Thông tin khách hàng {{$detail->consumer_name}}
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
                    <form action="{{URL::TO('/admin/update_consumer/'.$detail->consumer_id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="nameId" class="form-label fw-bold">Tên khách hàng</label>
                            <input type="text" name="consumer_name" placeholder="Nhập tên khách hàng" class="form-control" id="nameId" required value="{{$detail->consumer_name}}">
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="mailId" class="form-label fw-bold">Gmail</label>
                                    <input type="email" readonly name="consumer_gmail" placeholder="Nhập gmail" class="form-control" id="mailId" required value="{{$detail->consumer_gmail}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="passId" class="form-label fw-bold">Mật khẩu</label>
                                    <input type="password" name="consumer_password" placeholder="Nhập mật khẩu" class="form-control" id="passId" readonly required value="{{$detail->consumer_password}}">
                                </div>
                            </div>

                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="phoneId" class="form-label fw-bold">Số điện thoại</label>
                                    <input type="number" name="consumer_phone" placeholder="Nhập số điện thoại" class="form-control" id="phoneId" value="{{$detail->consumer_phone}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="daybirthId" class="form-label fw-bold">Ngày sinh</label>
                                    <input type="date" name="consumer_daybirth" class="form-control" id="daybirthId" value="{{$detail->consumer_daybirth}}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="addressId" class="form-label fw-bold">Địa chỉ</label>
                            <input type="text" name="consumer_address" placeholder="Nhập địa chỉ" class="form-control" id="addressId" value="{{$detail->consumer_address}}">
                        </div>


                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-pen-square me-2"></i> Cập nhật thông tin khách hàng
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
    @endforeach
@endsection
