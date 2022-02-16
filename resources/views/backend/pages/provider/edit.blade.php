@extends('backend.layout')

@section('title', 'Loại: '.$name_id)


@section('content')
    @foreach ($provider as $key => $detail)
        <div class="mt-2 border bg-light">
            <h3 class="text-center border-bottom p-3 text-uppercase">
                Thông tin loại {{$detail->provider_name}}
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
                    <form action="{{URL::TO('/admin/update_provider/'.$detail->provider_id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="nameId" class="form-label fw-bold">Tên loại bánh</label>
                            <input type="text" name="provider_name" placeholder="Nhập tên loại bánh" class="form-control" id="nameId" required value="{{$detail->provider_name}}">
                          </div>

                          <div class="mb-3">
                              <label for="phoneId" class="form-label fw-bold">Số điện thoại</label>
                              <input type="number" name="provider_phone" placeholder="Nhập số điện thoại" class="form-control" id="phoneId" required value="{{$detail->provider_phone}}">
                          </div>

                          <div class="mb-3">
                              <label for="mailId" class="form-label fw-bold">Gmail </label>
                              <input type="email" name="provider_gmail" placeholder="Nhập gmail" class="form-control" id="mailId" required value="{{$detail->provider_gmail}}">
                          </div>

                          <div class="mb-3">
                              <label for="addressId" class="form-label fw-bold">Địa chỉ </label>
                              <input type="text" name="provider_address" placeholder="Nhập gmail" class="form-control" id="addressId" required value="{{$detail->provider_address}}">
                          </div>

                          <div class="mb-3">
                              <label for="noteId" class="form-label fw-bold">Ghi chú (nếu có)</label>
                              {{-- <textarea type="text" rows="4" name="provider_note" class="form-control" id="noteId">
                                    {{$detail->provider_note}}
                              </textarea> --}}
                              <textarea type="text" rows="4"  name="provider_note"  class="form-control" id="noteId" required> {{$detail->provider_note}}</textarea>
                          </div>

                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-pen-square me-2"></i> Cập nhật nhà cung cấp
                        </button>
                        <a href="{{URL::TO('/admin/all_provider')}}" class="btn btn-info">
                            <i class="fas fa-arrow-alt-circle-left me-2"></i> Quay về trang danh sách nhà cung cấp
                        </a>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    @endforeach
@endsection
