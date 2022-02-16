@extends('backend.layout')

@section('title', 'Trang chủ')

@section('content')

    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Sản phẩm ({{$countProduct}})</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{URL::TO('/admin/all_product')}}">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Nhân viên ({{$countAdmin}})</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{URL::TO('/admin/all_admin')}}">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Khách hàng ({{$countConsumer}})</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{URL::TO('/admin/all_consumer')}}">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Vận chuyển đơn hàng ({{$countBill}})</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{URL::TO('/admin/list_shipping')}}">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

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
        {{-- <div class="row">
            <div class="col-lg-6  text-start">
                <p class="ms-3 fw-bold">Tổng sản phẩm hiện có: {{$count}}</p>
            </div>
            <div class="col-lg-6 text-center">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="ms-3 fw-bold">Đã kích hoạt: {{$acitve}}</p>
                    </div>
                    <div class="col-lg-6">
                <p class="ms-3 fw-bold">Chưa kích hoạt: {{$unacitve}}</p>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row m-2">
            <div class="col"></div>
            <div class="col">
                <form action="{{URL::TO('/admin/show_bill_status')}}" method="get">
                    <div class="row d-flex flex-row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-5">
                            <input type="date" class="form-control" name="bill_date" id="setDateValue" value="<?php echo date("Y-m-d"); ?>" />
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>

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
                @if ($count == 0)
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
        <div class="m-3">
            {{$list->links()}}
        </div>
    </div>


@endsection
