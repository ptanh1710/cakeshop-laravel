@extends('backend.layout')

@section('title', 'Hoá đơn bán hàng')

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

        <table class="table table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col">Mã Đơn</th>
                    <th scope="col">Thông tin</th>
                    <th scope="col">Ngày đặt hàng</th>
                    <th scope="col">Tổng đơn hàng</th>
                    <th scope="col">Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $key => $value)
                    <tr class="text-center">
                        <th scope="row">
                            {{$value->bill_id}}
                        </th>
                        <td class="text-start text-capitalize">
                            <p>Người mua: {{$value->consumer_name}}</p>
                            <p>Người nhận:  {{$value->shipping_name}} </p>
                        </td>
                        <td>
                            {{\Carbon\Carbon::parse($value->bill_date)->format('d/m/Y')}}
                        </td>
                        <td>
                            {{($value->bill_totalprice)}} VNĐ
                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/detail_bill/'.$value->bill_id)}}" style="width: 105px;" class="btn btn-info" title="Chi tiết sản phẩm {{$value->bill_id}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-3">
            {{$list->links()}}
        </div>
    </div>
@endsection

