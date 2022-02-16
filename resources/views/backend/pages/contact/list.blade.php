@extends('backend.layout')

@section('title', 'Danh sách khách hàng')

@section('content')
    <div class="mt-2 border bg-light">
        <h3 class="text-center border-bottom p-3 text-uppercase">
            Danh sách phản hồi của khách hàng
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
                <p class="ms-3 fw-bold">Tổng số phản hồi hiện có: {{$count}}</p>
            </div>
            <div class="col-lg-6 text-center">

            </div>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col">Ngày phản hồi</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Gmail</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @if ($count == 0)
                    <tr class="text-center text-danger">
                        <th colspan="5">
                            <b>Không có phản hồi từ khách hàng</b>
                        </th>
                    </tr>
                @else
                @foreach ($list as $key => $contact)
                    <tr class="text-center">
                        <th scope="row">
                            {{\Carbon\Carbon::parse($contact->contact_date)->format('d/m/Y')}}
                        </th>
                        <td class="text-start">{{$contact->contact_title}}</td>
                        <td class="text-start">{{$contact->contact_name}}</td>
                        <td class="text-start">
                            {{$contact->contact_gmail}}
                        </td>
                        <td>
                            <a href="{{URL::TO('/admin/detail_contact/'.$contact->contact_id)}}" style="width: 105px;" class="btn btn-info" title="Chi tiết phản hồi của KH: {{$contact->contact_name}}">
                                <i class="fas fa-edit me-2"></i>Chi tiết
                            </a>
                        </td>

                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="m-3">
            {{$list->links()}}
        </div>
    </div>
@endsection

