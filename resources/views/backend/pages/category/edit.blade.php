@extends('backend.layout')

@section('title', 'Loại: '.$cate_name)


@section('content')
    @foreach ($category as $key => $detail)
        <div class="mt-2 border bg-light">
            <h3 class="text-center border-bottom p-3 text-uppercase">
                Thông tin loại {{$detail->category_name}}
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
                    <form action="{{URL::TO('/admin/update_category/'.$detail->category_id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                        <label for="nameId" class="form-label fw-bold">Tên loại bánh</label>
                        <input type="text" name="category_name" placeholder="Nhập tên loại bánh" class="form-control" id="nameId" required value="{{$detail->category_name}}">
                        </div>
                        <div class="mb-3">
                            <label for="noteId" class="form-label fw-bold">Ghi chú (nếu có)</label>
                            <textarea type="text" name="category_note"  class="form-control" id="noteId" required></textarea> {{$detail->category_note}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-pen-square me-2"></i> Cập nhật loại bánh
                        </button>
                        <a href="{{URL::TO('/admin/all_category')}}" class="btn btn-info">
                            <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách loại bánh
                        </a>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    @endforeach
@endsection
