@extends('backend.layout')

@section('title', 'Danh sách bánh ngọt ' .$status_name)

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách sản phẩm {{$status_name}}
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
                <p class="ms-3 fw-bold">Tổng sản phẩm <span style="color: #ff0000">{{$status_name}}</span> ngày
                    <span style="color: #ff0000">{{\Carbon\Carbon::parse($dateSelect)->format('d/m/Y')}}</span> hiện có: {{$count}} / {{$countTotal}} tổng sản phẩm</p>
            </div>

        </div>
        <div class="row m-2">
            <div class="col text-start ">
                <a href="{{URL::TO('/admin/add_product')}}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i> Thêm sản phẩm mới
                </a>
            </div>
            <div class="col">
                <form action="{{URL::TO('/admin/show_product_status')}}" method="get">
                    <div class="row d-flex flex-row">
                        <div class="col-lg-5">
                            <input type="date" class="form-control" name="product_date" id="setDateValue" value="{{$dateSelect}}" />
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" name="product_status">
                                <option value="0">Unactive</option>
                                <option value="1">Active</option>
                                <option value="2">Tất cả</option>
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
                    <th scope="col">Mã loại</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @if($count == 0)
                <tr>
                    <th colspan="5" class="text-center text-danger">
                        <b>Không có sản phẩm</b>
                    </th>
                </tr>
                @else
                @foreach ($product_id as $key => $product)
                    <tr class="text-center">
                        <th scope="row">
                            {{$product->product_id}}
                        </th>
                        <td class="text-start text-capitalize">
                            <p>{{$product->product_name}}</p>
                            <p>Mã SP:  {{$product->product_id}} </p>
                            <p>Ngày nhập hàng: {{\Carbon\Carbon::parse($product->product_date)->format('d/m/Y')}}</p>
                        </td>
                        <td>
                            <img src="{{URL::TO('public/uploads/product/'.$product->product_img)}}" width="120px" height="120px" alt="{{$product->product_name}}">
                        </td>
                        <td>
                            <?php
                                if($product->product_status === 0){
                            ?>
                                <a href="{{URL::TO('/admin/active/'.$product->product_id)}}" style="width: 117px" class="btn btn-success" title="Chưa kích hoạt sản phẩm">
                                    <i class="fas fa-times-circle me-2"></i> Unactive
                                </a>
                            <?php
                                }
                                else {
                            ?>
                                <a href="{{URL::TO('/admin/unactive/'.$product->product_id)}}" style="width: 117px" class="btn btn-primary" title="Đã kích hoạt sản phẩm">
                                    <i class="fas fa-check-circle me-2"></i> Active
                                </a>
                            <?php
                                }
                            ?>



                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/edit_product/'.$product->product_id)}}" style="width: 105px;" class="btn btn-info" title="Chi tiết sản phẩm {{$product->product_name}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                            <a href="{{URL::TO('/admin/delete_product/'.$product->product_id)}}" style="width: 105px;" class="btn btn-danger"title=" Xoá sp: {{$product->product_name}}" onclick="return confirm('Bạn có chắc muốn xoá nhà cung cấp {{$product->product_name}} này không???')">
                                <i class="fas fa-trash-alt me-2"></i>Xoá
                            </a>
                        </td>


                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{-- <div class="m-3">
            {{$product_id->links()}}
        </div> --}}
    </div>
@endsection

