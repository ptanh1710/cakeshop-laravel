@extends('backend.layout')

@section('title', 'Danh sách loại bánh '.$status_name)

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách Loại Bánh {{$status_name}}
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
                <p class="ms-3 fw-bold">Tổng số loại bánh <span style="color: #ff0000">{{$status_name}}</span> hiện có: {{$count}} / {{$countTotal}} loại sản phẩm</p>
            </div>

        </div>
        <div class="row m-2">
            <div class="col text-start">
                <a href="{{URL::TO('/admin/add_category')}}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i> Thêm loại bánh mới
                </a>
            </div>
            <div class="col d-flex flex-row-reverse">
                <form action="{{URL::TO('/admin/show_category_status')}}" method="get">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="col">
                            <select class="form-select" name="category_status">
                                <option value="0">Unactive</option>
                                <option value="1">Active</option>
                                <option value="2">Tất cả</option>
                            </select>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" style="width: 120px;">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col">Mã loại</th>
                    <th scope="col">Tên loại bánh</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Sản phẩm</th>
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
                @foreach ($cate as $key => $category)
                    <tr class="text-center">
                        <th scope="row">
                            {{$category->category_id}}
                        </th>
                        <td class="text-start">{{$category->category_name}}</td>
                        <td>
                            <?php
                                if($category->category_status === 0){
                            ?>
                                <a href="{{URL::TO('/admin/active_cate/'.$category->category_id)}}" style="width: 117px" class="btn btn-success" title="Chưa kích hoạt sản phẩm">
                                    <i class="fas fa-times-circle me-2"></i> Unactive
                                </a>
                            <?php
                                }
                                else {
                            ?>
                                <a href="{{URL::TO('/admin/unactive_cate/'.$category->category_id)}}" style="width: 117px" class="btn btn-primary" title="Đã kích hoạt sản phẩm">
                                    <i class="fas fa-check-circle me-2"></i> Active
                                </a>
                            <?php
                                }
                            ?>



                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/show_category_by_id/'.$category->category_id)}}" style="width: 122px;" class="btn btn-secondary" title="Các sản phẩm thuộc {{$category->category_name}}">
                                <i class="fas fa-clipboard-list me-2"></i> Sản phẩm
                            </a>
                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/edit_category/'.$category->category_id)}}" style="width: 105px;" class="btn btn-info" title="Chi tiết sản phẩm {{$category->category_name}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                            <a href="{{URL::TO('/admin/delete_category/'.$category->category_id)}}" style="width: 105px;" class="btn btn-danger"title=" Xoá sp: {{$category->category_name}}" onclick="return confirm('Bạn có chắc muốn xoá loại {{$category->category_name}} này không???')">
                                <i class="fas fa-trash-alt me-2"></i>Xoá
                            </a>
                        </td>

                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{-- <div class="m-3">
            {{$cate->links()}}
        </div> --}}
    </div>
@endsection

