@extends('backend.layout')

@section('title', 'Khách hàng: '. $name)


@section('content')
    @foreach ($detail as $key => $value)
        <div class="mt-2 border bg-light">
            <h3 class="text-center border-bottom p-3 text-uppercase">
                Thông tin Khách hàng phản hồi
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

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="nameId" class="form-label fw-bold">Tên khách hàng</label>
                                <input type="text" readonly name="contact_name" class="form-control" id="nameId" required value="{{$value->contact_name}}">
                            </div>
                            <div class="col">
                                <label for="mailId" class="form-label fw-bold">Gmail</label>
                                <input type="email" readonly name="contact_gmail" class="form-control" id="mailId" required value="{{$value->contact_gmail}}">
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <div class="col">
                            <label for="titleId" class="form-label fw-bold">Tiêu đề phản hồi</label>
                            <input type="text" readonly name="contact_title" class="form-control" id="titleId" required value="{{$value->contact_title}}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="contentId" class="form-label fw-bold">Nôi dung phản hồi</label>
                        <textarea type="text" rows="5" readonly name="contact_content" class="form-control" id="contentId" required >{{$value->contact_content}}</textarea>
                    </div>

                    <div class="mb-3">
                        <a href="{{URL::TO('/admin/list_contact')}}" class="btn btn-info">
                            <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách nhân viên
                        </a>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    @endforeach
@endsection
