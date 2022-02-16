@extends('backend.layout')

@section('title', 'Thêm loại bánh')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Thêm Loại Bánh
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
                <form action="{{URL::TO('/admin/save_category')}}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                      <label for="nameId" class="form-label fw-bold">Tên loại bánh</label>
                      <input type="text" name="category_name" placeholder="Nhập tên loại bánh" class="form-control" id="nameId" required>
                    </div>
                    <div class="mb-3">
                        <label for="noteId" class="form-label fw-bold">Ghi chú (nếu có)</label>
                        <textarea type="text" rows="4" name="category_note" class="form-control" id="noteId" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="noteId" class="form-label fw-bold">Trạng thái</label>
                        <select id="inputState" class="form-select" name="category_status">
                            <option selected value="0">Không kích hoạt</option>
                            <option value="1">Kích hoạt</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-plus-square me-2"></i> Thêm loại bánh
                    </button>

                    <a href="{{URL::TO('/admin/all_category')}}" class="btn btn-info">
                        <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách loại bánh
                    </a>
                  </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
@endsection
