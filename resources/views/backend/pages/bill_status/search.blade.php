@extends('backend.layout')

@section('title', 'Vận chuyển đơn hàng')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách tiến trình vận chuyển đơn hàng
        </h3>
        @php
            $message = session()->get('message');
            if($message){
                echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                $message = session()->put('message',null);
            }
        @endphp
        <div class="row">
            <div class="col  text-start">
                <p class="ms-3 fw-bold">Tổng hoá đơn ngày
                    <span style="color: #ff0000">{{\Carbon\Carbon::parse($date)->format('d/m/Y')}} - {{$status_name}}</span> hiện có: {{$count}} / {{$countTotal}} tổng sản phẩm</p>
            </div>
        </div>
        <div class="row m-2">
            <div class="col"></div>
            <div class="col">
                <form action="{{URL::TO('/admin/show_bill_product')}}" method="get">
                    <div class="row d-flex flex-row">
                        <div class="col-lg-5">
                            <input type="date" class="form-control" name="bill_date" id="setDateValue" value="{{$date}}" />
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" name="bill_status">
                                <option selected value="0">Tất cả</option>
                                <option value="1">Huỷ đơn hàng</option>
                                <option value="2">Đặt hàng</option>
                                <option value="3">Đang xử lý</option>
                                <option value="4">Đang vận chuyển</option>
                                <option value="5">Đã giao hàng</option>

                            </select>
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
                    <th scope="col">Mã Đơn</th>
                    <th scope="col">Thông tin</th>
                    <th scope="col">Tổng đơn hàng</th>
                    <th scope="col">Thanh toán</th>
                    <th scope="col">Tình trạng vận chuyển</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @if ($count == 0)
                    <tr>
                        <th colspan="6" class="text-center text-danger">
                            <b>Không có hoá đơn</b>
                        </th>
                    </tr>

                @else
                @foreach ($list as $key => $value)
                    <tr class="text-center">
                        <th scope="row">
                            {{$value->bill_id}}
                        </th>
                        <td class="text-start text-capitalize">
                            <p>Người mua: {{$value->consumer_name}}</p>
                            <p>Người nhận:  {{$value->shipping_name}} </p>
                            <p>Ngày đặt hàng: {{\Carbon\Carbon::parse($value->bill_date)->format('d/m/Y')}}</p>
                        </td>
                        <td>
                            {{($value->bill_totalprice)}}
                        </td>
                        <td>
                            {{$value->payment_name}}
                        </td>
                        <td>
                            @switch($value->bill_status)

                                @case($value->bill_status === 2)
                                    <a href="{{URL::TO('/admin/change_bill_status/'.$value->bill_id)}}" class="btn btn-primary" style="width: 150px;">
                                        {{$value->transport_name}}
                                    </a>
                                    @break

                                @case($value->bill_status === 3)
                                    <a href="{{URL::TO('/admin/change_bill_status/'.$value->bill_id)}}" class="btn btn-warning" style="width: 150px;">
                                        {{$value->transport_name}}
                                    </a>
                                    @break

                                @case($value->bill_status === 4)
                                    <a href="{{URL::TO('/admin/change_bill_status/'.$value->bill_id)}}" class="btn btn-info" style="width: 150px;">
                                        {{$value->transport_name}}
                                    </a>
                                    @break

                                @case($value->bill_status === 5)
                                    <p class="btn btn-success" style="width: 150px;">
                                        {{$value->transport_name}}
                                    </p>
                                    @break
                                @default
                                    <p class="btn btn-danger" style="width: 150px;">
                                        {{$value->transport_name}}
                                    </p>

                            @endswitch

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

