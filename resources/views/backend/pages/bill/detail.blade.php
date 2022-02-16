@extends('backend.layout')

@section('title', 'Hoá đơn: '.$value->bill_id.' | Tên KH: '.$value->consumer_name)


@section('content')
        <div class="mt-2 border bg-light">
            <h3 class="text-center border-bottom p-3 text-uppercase">
                Thông tin đơn hàng
            </h3>
            @php
                $message = session()->get('message');
                if($message){
                    echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                    $message = session()->put('message',null);
                }
            @endphp

            <div class="row p-2">
                <div class="col-lg-7">
                    <table class="table table-bordered table-info">
                        <thead>
                            <tr>
                                <th scope="col">Thông tin người mua</th>
                                <th scope="col">Thông tin người nhận</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Họ và tên: <b>{{$value->consumer_name}}</b></td>
                                <td>Họ và tên: <b>{{$value->shipping_name}}</b></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại: <b>{{$value->consumer_phone}}</b></td>
                                <td>Số điện thoại: <b>{{$value->shipping_phone}}</b></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-success">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" colspan="2">Địa chỉ giao hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col" colspan="2">Địa chỉ: <b>{{$value->shipping_address}}</b></td>
                            </tr>
                            <tr>
                                <td scope="col" colspan="2">Ghi chú: <b>{{$value->shipping_note}}</b></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col-lg-5">
                    <table class="table table-bordered table-success">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" colspan="2">Thông tin hoá đơn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col">Ngày đặt hàng</td>
                                <td scope="col"><b>{{\Carbon\Carbon::parse($value->bill_date)->format('d/m/Y')}}</b></td>

                            </tr>
                            <tr>
                                <td scope="col">PP Thanh toán</td>
                                <td scope="col"><b>{{$value->payment_name}}</b></td>
                            </tr>
                            <tr>
                                <td scope="col">PP Vận chuyển</td>
                                <td scope="col"><b>{{$value->transport_name}}</b></td>
                            </tr>
                            <tr>
                                @foreach ($sum as $s)
                                <td scope="col">Giá gốc(chưa thuế)</td>
                                <td scope="col"><b class="text-danger">{{number_format($s)}} VNĐ</b></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td scope="col">Thuế</td>
                                <td scope="col"><b>10% giá gốc</b></td>
                            </tr>

                            <tr>
                                <td scope="col">Tổng đơn hàng</td>
                                <td scope="col"><b class="text-danger">{{$value->bill_totalprice}} VNĐ</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-lg-12">
                    <h5 class="text-center border-bottom p-3 text-uppercase">
                        Chi tiết đơn hàng
                    </h5>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_product as $detail)
                            <tr class="text-center">
                                <th scope="row">{{$detail->product_id}}</th>
                                {{-- @if ($detail->product_id == $value->product_id) --}}
                                <td>{{$detail->product_name}}</td>
                                <td>
                                    <img src="{{URL::TO('public/uploads/product/'.$detail->product_img)}}" width="60px" height="60px" alt="{{$detail->product_name}}">
                                </td>
                                <td>{{$detail->billdetail_amount}}</td>
                                <td>{{number_format($detail->billdetail_price)}}</td>
                                {{-- @endif --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-start mt-2 mb-2">
                    <a href="{{URL::TO('/admin/list_shipping')}}" class="btn btn-primary">
                        <i class="fas fa-arrow-alt-circle-left"></i> Quay về trang hoá đơn
                    </a>
                </div>
            </div>
        </div>
@endsection
