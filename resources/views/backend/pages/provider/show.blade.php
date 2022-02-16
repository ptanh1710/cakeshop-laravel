@extends('backend.layout')

@section('title', 'Dach sách bánh thuộc '.$name_id)

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách Bánh thuộc loại {{$name_id}}
        </h3>
        {{-- @php
            $message = session()->get('message');
            if($message){
                echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                $message = session()->put('message',null);
            }
        @endphp --}}
        <div class="row">
            <div class="col-lg-12  text-start">
                <p class="ms-3 fw-bold">Tổng số sản phẩm thuộc loại '{{$name_id}}': {{$count}} sản phẩm</p>
            </div>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col">Mã loại</th>
                    <th scope="col">Tên bánh</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_product as $key => $value)
                    <tr class="text-center">
                        <th scope="row">
                            {{$value->product_id}}
                        </th>
                        <td class="text-start">{{$value->product_name}}</td>
                        <td>
                            <img src="{{URL::TO('public/uploads/product/'.$value->product_img)}}" width="120px" height="120px" alt="{{$value->product_name}}">
                        </td>
                        <td>
                            {{$name_id}}
                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/edit_product/'.$value->product_id)}}" style="width: 115px;" class="btn btn-info" title="Chi tiết sản phẩm {{$value->product_name}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                            <a href="{{URL::TO('/admin/all_category')}}" class="btn btn-danger" style="width: 115px;"  title="Quay về trang danh sách loại bánh">
                                <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về
                            </a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="m-3">
            {{$list_product->links()}}
        </div> --}}
    </div>
@endsection

