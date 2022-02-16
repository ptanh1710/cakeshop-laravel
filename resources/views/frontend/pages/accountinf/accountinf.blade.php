@extends('template')
@section('title', 'Thông tin tài khoản')
@section('content')
<section class="contact_form_area p_100">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4 col-lg-3 br-md-1">
                <div class="sidebar-left">
                    <ul class="sidebar-nav">
                        <li><a href="#"><i class="icons icon-account"></i>Thông tin tài khoản</a></li>
                        <li><a href="#"><i class="icons icon-location"></i> Địa chỉ của tôi</a></li>
                        <li><a href="{{URL::to('/logout-checkout')}}"><i class="icons icon-logout"></i> Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 col-lg-8">
                <section class="section pl-md-4">
                    <div class="row mb-4">
                    <form class="accountForm" action="{{URL::to('/update-accountinf')}}" method="POST">
                        {{csrf_field()}}
                        <div class="col-md-9">
                            <div class="main_title">
                                <h2>Thông tin của bạn</h2>
                            </div>
                            @foreach($all_consumer as $key => $info)
                            <div class="form-group">
                                <input class="form-control" value="{{$info->consumer_name}}" type="text" name="consumer_name" id="consumer_name" placeholder="Họ tên">
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="{{$info->consumer_phone}}" type="text" name="consumer_phone" id="consumer_phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="{{$info->consumer_gmail}}" type="text" name="consumer_gmail" id="consumer_gmail" placeholder="Hãy nhập email" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="{{$info->consumer_daybirth}}" type="date" name="consumer_daybirth" id="consumer_daybirth">
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="{{$info->consumer_address}}" type="text" name="consumer_address" id="consumer_address" placeholder="Nhập địa chỉ khách hàng">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="check" id="check" placeholder="Họ tên"> Tôi đồng ý với điều khoản
                            </div>
                            @endforeach
                            <button type="submit" class="btn pest_btn">Lưu</button>
                        </div>
                    </form>
                    <?php
                        $message = session()->get('message');
                        if($message) {
                            echo '<p style="margin-top:10px; color: green; font-size:12;">'.$message.'</p>';
                            $message = session()->put('message',null);
                        }
                    ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection