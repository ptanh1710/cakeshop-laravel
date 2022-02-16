@extends('backend.layout')

@section('title', 'Danh sách hoá đơn của KH: '. $name)

@section('content')

    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách hoá đơn bán hàng
        </h3>
        @php
            $message = session()->get('message');
            if($message){
                echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                $message = session()->put('message',null);
            }
        @endphp
        <div class="row  m-2">
            <div class="col text-start fw-bold">
                <p>Tên khách hàng: {{$name}}</p>
                <p>
                    Tổng số đơn hàng của khách hàng: {{$count}}
                </p>
            </div>
            <div class="col text-end">
                <a href="{{URL::TO('/admin/all_consumer')}}" class="btn btn-primary">
                    <i class="fas fa-arrow-alt-circle-left me-2"></i>Quay về trang khách hàng
                </a>
            </div>

        </div>

        <table class="table table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col">Thông tin chung</th>
                    <th scope="col">Tình trạng đơn hàng</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @if($count == 0)
                <tr>
                    <th colspan="3" class="text-center text-danger">
                        <b>Không có hoá đơn</b>
                    </th>
                </tr>
                @else
                @foreach ($list as $key => $value)
                    <tr class="text-center">

                        <td class="text-start text-capitalize">
                            <div class="row">
                                <div class="col">
                                    <p>MĐH: <span class="fw-bold">{{$value->bill_id}}</span></p>
                                    <p>Người mua: <span class="fw-bold">{{$value->consumer_name}}</span></p>
                                    <p>Người nhận:  <span class="fw-bold">{{$value->shipping_name}}</span> </p>
                                </div>
                                <div class="col">
                                    <p>Ngày đặt: <span class="fw-bold">{{\Carbon\Carbon::parse($value->bill_date)->format('d/m/Y')}}</span></p>
                                    <p>Tổng đơn hàng:   </p>
                                    <p><span class="fw-bold">{{($value->bill_totalprice)}} VNĐ</span></p>
                                </div>
                            </div>

                        </td>
                        <td class="text-start">
                            <p>Thanh toán hoá đơn: </p>
                            <p><span class="fw-bold">{{($value->payment_name)}}</span></p>
                            <p>Tình trạng:  <span class="fw-bold">{{$value->transport_name}}</span></p>
                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/detail_bill/'.$value->bill_id)}}" style="width: 105px;" class="btn btn-info" title="Chi tiết sản phẩm {{$value->bill_id}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                        </td>

                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{-- <div class="m-3">
            {{$list->links()}}
        </div> --}}
    </div>
@endsection
