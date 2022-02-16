@extends('backend.layout')

@section('title', 'Bánh: '.$name_id)


@section('content')
    @foreach ($product as $key => $detail)
        <div class="mt-2 border bg-light">
            <h3 class="text-center border-bottom p-3 text-uppercase">
                Thông tin loại {{$detail->product_name}}
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
                    <form action="{{URL::TO('/admin/update_product/'.$detail->product_id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="nameId" class="form-label fw-bold">Tên bánh</label>
                            <input type="text" name="product_name" placeholder="Nhập tên bánh" class="form-control" id="nameId" required value="{{$detail->product_name}}">
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="formFile" class="form-label fw-bold">Hình ảnh</label>
                                <input class="form-control imgPreview" type="file" id="formFile" name="product_img" onchange="previewFile(this);" >
                            </div>
                            <div class="col-lg-6">
                                <img class="border border-secondary mt-2" id="previewImg" src="{{URL::TO('public/uploads/product/'.$detail->product_img)}}" width="120px" height="120px" alt="{{$detail->product_name}}">
                            </div>
                        </div>

                        <div class="mb-3">
                           <div class="row">
                                <div class="col-lg-6">
                                    <label for="amountId" class="form-label fw-bold">Số lượng bánh</label>
                                    <input type="number" name="product_amount" min="1" placeholder="Nhập số lượng" class="form-control" id="amountId" required value="{{$detail->product_amount}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="priceId" class="form-label fw-bold">Giá bán</label>
                                <input type="number" name="product_price" min="1" placeholder="Nhập giá bán"class="form-control" id="priceId" required value="{{$detail->product_price}}">
                                </div>
                            </div>
                        </div>

                        <div class="md-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="noteId" class="form-label fw-bold">Loại bánh</label>
                                    <select id="inputState" class="form-select" name="category_id">
                                        @foreach ($category as $key => $cate)
                                            @if ($cate->category_id == $detail->category_id)
                                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="noteId" class="form-label fw-bold">Nhà cung cấp</label>
                                    <select id="inputState" class="form-select" name="provider_id">
                                        @foreach ($provider as $key => $provider)
                                            @if ($provider->provider_id == $detail->provider_id)
                                                <option selected value="{{$provider->provider_id}}">{{$provider->provider_name}}</option>
                                            @else
                                                <option value="{{$provider->provider_id}}">{{$provider->provider_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="materialId" class="form-label fw-bold">Nguyên vật liệu</label>
                            <input type="text" name="product_material"  placeholder="Nhập Nuyên vật liệu"class="form-control" id="materialId" value="{{$detail->product_material}}">
                         </div>

                        <div class="mb-3">
                            <label for="descId" class="form-label fw-bold">Mô tả</label>
                            <textarea type="text" rows="8" name="product_desc"  class="form-control" id="descId" >{{$detail->product_desc}}</textarea>

                        </div>



                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-pen-square me-2"></i> Cập nhật thông tin sản phẩm
                            </button>
                            <a href="{{URL::TO('/admin/all_product')}}" class="btn btn-info">
                                <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách sản phẩm
                            </a>
                        </div>

                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    @endforeach
@endsection
