@extends('backend.layout')

@section('title', 'Danh sách nhà cung cấp')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách nhà cung cấp
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
                <p class="ms-3 fw-bold">Tổng nhà cung cấp hiện có: {{$count}}</p>
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
        </div>
        <div class="row  m-2">
            <div class="col text-start">
                <a href="{{URL::TO('/admin/add_provider')}}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i> Thêm nhà cung cấp mới
                </a>
            </div>
            <div class="col d-flex flex-row-reverse">
                <form action="{{URL::TO('/admin/show_provider_status')}}" method="get">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="col">
                            <select class="form-select" name="provider_status">
                                <option value="0">Unactive</option>
                                <option value="1">Active</option>
                                <option selected value="2">Tất cả</option>
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
                    <th scope="col">Nhà cung cấp</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($provider_id as $key => $provider)
                    <tr class="text-center">
                        <th scope="row">
                            {{$provider->provider_id}}
                        </th>
                        <td class="text-start">{{$provider->provider_name}}</td>
                        <td>
                            <?php
                                if($provider->provider_status === 0){
                            ?>
                                <a href="{{URL::TO('/admin/active_prv/'.$provider->provider_id)}}" style="width: 117px" class="btn btn-success" title="Chưa kích hoạt sản phẩm">
                                    <i class="fas fa-times-circle me-2"></i> Unactive
                                </a>
                            <?php
                                }
                                else {
                            ?>
                                <a href="{{URL::TO('/admin/unactive_prv/'.$provider->provider_id)}}" style="width: 117px" class="btn btn-primary" title="Đã kích hoạt sản phẩm">
                                    <i class="fas fa-check-circle me-2"></i> Active
                                </a>
                            <?php
                                }
                            ?>



                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/show_provider_by_id/'.$provider->provider_id)}}" style="width: 122px;" class="btn btn-secondary" title="Các sản phẩm thuộc {{$provider->provider_name}}">
                                <i class="fas fa-clipboard-list me-2"></i> Sản phẩm
                            </a>
                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/edit_provider/'.$provider->provider_id)}}" style="width: 105px;" class="btn btn-info" title="Chi tiết sản phẩm {{$provider->provider_name}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                            <a href="{{URL::TO('/admin/delete_provider/'.$provider->provider_id)}}" style="width: 105px;" class="btn btn-danger"title=" Xoá sp: {{$provider->provider_name}}" onclick="return confirm('Bạn có chắc muốn xoá nhà cung cấp {{$provider->provider_name}} này không???')">
                                <i class="fas fa-trash-alt me-2"></i>Xoá
                            </a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-3">
            {{$provider_id->links()}}
        </div>
    </div>
@endsection

