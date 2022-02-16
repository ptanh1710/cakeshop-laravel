@extends('backend.layout')

@section('title', 'Danh sách khách hàng')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách khách hàng
        </h3>
        @php
            $message = session()->get('message');
            if($message){
                echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                $message = session()->put('message',null);
            }
        @endphp
        <div class="row">
            <div class="col-lg-6  text-start">
                <p class="ms-3 fw-bold">Tổng số khách hàng hiện có: {{$count}}</p>
            </div>
            <div class="col-lg-6 text-center">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-start m-2">
                <a href="{{URL::TO('/admin/add_consumer')}}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i> Thêm khách hàng mới
                </a>
            </div>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col">Mã loại</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Gmail</th>
                    <th scope="col">Hoá đơn</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consumer_id as $key => $consumer)
                    <tr class="text-center">
                        <th scope="row">
                            {{$consumer->consumer_id}}
                        </th>
                        <td class="text-start">{{$consumer->consumer_name}}</td>
                        <td class="text-start">
                            {{$consumer->consumer_gmail}}
                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/search_bill_user/'.$consumer->consumer_id)}}" style="width: 120px;" class="btn btn-primary" title="Hoá đơn KH: {{$consumer->consumer_name}}">
                                <i class="fas fa-file-invoice me-2"></i>Hoá đơn
                            </a>

                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/edit_consumer/'.$consumer->consumer_id)}}" style="width: 105px;" class="btn btn-info" title="Chi tiết nhân viên {{$consumer->consumer_name}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                            <a href="{{URL::TO('/admin/delete_consumer/'.$consumer->consumer_id)}}" style="width: 105px;" class="btn btn-danger"title=" Xoá nhân viên: {{$consumer->consumer_name}}" onclick="return confirm('Bạn có chắc muốn xoá nhân viên {{$consumer->consumer_name}} này không???')">
                                <i class="fas fa-trash-alt me-2"></i>Xoá
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-3">
            {{$consumer_id->links()}}
        </div>
    </div>
@endsection

