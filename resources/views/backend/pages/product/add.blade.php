@extends('backend.layout')

@section('title', 'Thêm bánh')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Thêm Bánh
        </h3>
        <div class="row p-2">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @php
                    $message = session()->get('message');
                    if($message){
                        echo '<p class="text-danger fw-bold text-center">'.$message.'</p>';
                        $message = session()->put('message',null);
                    }
                @endphp
                <form action="{{URL::TO('/admin/save_product')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                      <label for="nameId" class="form-label fw-bold">Tên bánh</label>
                      <input type="text" name="product_name" placeholder="Nhập tên bánh" class="form-control" id="nameId" required>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="formFile" class="form-label fw-bold">Hình ảnh</label>
                            <input class="form-control imgPreview" type="file" onchange="previewFile(this);" id="formFile" name="product_img">
                        </div>
                        <div class="col-lg-6 text-center">
                            <img class="border border-secondary mt-2" src="" width="120px" height="120px" id="previewImg" alt="Hình ảnh">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="amountId" class="form-label fw-bold">Số lượng bánh</label>
                                <input type="number" name="product_amount" min="1" placeholder="Nhập số lượng" class="form-control" id="amountId" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="priceId" class="form-label fw-bold">Giá bán</label>
                                <input type="number" name="product_price" min="1" placeholder="Nhập giá bán" class="form-control" id="priceId" required>
                            </div>
                        </div>
                    </div>

                    <div class="md-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="noteId" class="form-label fw-bold">Loại bánh</label>
                                <select id="inputState" class="form-select" name="category_id">
                                    @foreach ($category as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="noteId" class="form-label fw-bold">Nhà cung cấp</label>
                                <select id="inputState" class="form-select" name="provider_id">
                                    @foreach ($provider as $key => $provider)
                                        <option value="{{$provider->provider_id}}">{{$provider->provider_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="materialId" class="form-label fw-bold">Nguyên vật liệu</label>
                        <input type="text" name="product_material" min="1" placeholder="Nhập nguyên liệu" class="form-control" id="materialId">

                    </div>

                    <div class="mb-3">
                        <label for="descId" class="form-label fw-bold">Mô tả</label>
                        <textarea type="text" rows="8"  name="product_desc" class="form-control" id="descId">
                        </textarea>
                    </div>



                    <div class="mb-3">
                        <label for="noteId" class="form-label fw-bold">Trạng thái</label>
                        <select id="inputState" class="form-select" name="product_status">
                            <option selected value="0">Không kích hoạt</option>
                            <option value="1">Kích hoạt</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-plus-square me-2"></i> Thêm loại bánh
                    </button>

                    <a href="{{URL::TO('/admin/all_product')}}" class="btn btn-info">
                        <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách loại bánh
                    </a>
                  </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
@endsection
