@extends('template')
@section('title', 'Thanh toán')
@section('content')
<section class="billing_details_area p_100">
    <div class="container">
            <form action="{{URL::to('/order-place')}}" method="post" id="contactForm" novalidate="novalidate">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Chi tiết thanh toán</h2>
                    </div>
                    <div class="billing_form_area billing_form row">
                        <div class="form-group col-md-12">
                            <label for="fullname">Họ và tên <span style="color:red">(*)</span></label>
                            <input type="text" class="form-control" id="fullname" name="shipping_name" placeholder="Nhập họ và tên...">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">Địa chỉ giao hàng <span style="color:red">(*)</span></label>
                            <input type="text" class="form-control" id="address" name="shipping_address" placeholder="Nhập địa chỉ...">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email <span style="color:red">(*)</span></label>
                            <input type="text" class="form-control" id="email" name="shipping_gmail" placeholder="Nhập email...">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Số điện thoại <span style="color:red">(*)</span></label>
                            <input type="text" class="form-control" id="phone" name="shipping_phone" placeholder="Nhập số điện thoại...">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="message">Ghi chú đơn hàng</label>
                            <textarea class="form-control" name="shipping_note" id="message" rows="1" placeholder="Ghi chú về đơn đặt hàng của bạn. ví dụ. lưu ý đặc biệt cho giao hàng..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="order_box_price">
                        <div class="main_title">
                            <h2>Đơn hàng của bạn</h2>
                        </div>
                        <?php
                        $content = Cart::content();
                        ?>
                        <div class="payment_list">
                            <div class="price_single_cost">
                                <h5>Sản phẩm của bạn<span>Toàn bộ</span></h5>
                                @foreach ($content as $value)
                                <?php
                                $subtotal = $value->price * $value->qty;
                                ?>
                                <h5>{{$value->name}} ({{$value->qty}})<span>{{number_format($subtotal,0,',','.').'₫'}}</span></h5>
                                @endforeach
                                <h4>Tổng<span>{{(Cart::pricetotal(0)).'₫'}}</span></h4>
                                <h4>Thuế<span>{{(Cart::tax(0)).'₫'}}</span></h4>
                                <h5>Phí vận chuyển<span class="text_f">0đ</span></h5>
                                <h3>Thành tiền<span>{{(Cart::total(0)).'₫'}}</span></h3>
                            </div>
                            <div id="accordion" class="accordion_area">
                            @foreach ($all_payment as $key => $payment)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                    <label><input type="radio" checked name="paymentId_hidden" value="{{($payment->payment_id)}}">{{ $payment->payment_name }}</label>
                                    </div>
                                </div>
                            @endforeach
                                <button type="submit" value="submit" class="btn pest_btn" name="place_order">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
