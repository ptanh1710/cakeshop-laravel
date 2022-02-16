@extends('template')
@section('title', 'Giỏ hàng')
@section('content')
<section class="cart_table_area p_100">
    <div class="container">
        <div class="main_title">
			<h2>Giỏ hàng của bạn</h2>
        </div>
		<div class="table-responsive">
            <?php
            $content = Cart::content();
            ?>
			<table class="table">
				<thead>
					<tr>
                        <th scope="col">Xem trước</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <form action="{{URL::to('/update-cart')}}" method="POST">
                {{ csrf_field() }}
                <tbody>
                    @foreach ($content as $value)
                    <tr>  
                        <td>
                        <img src="{{URL::to('public/uploads/product/'.$value->options->image)}}" width="120" height="132" alt="">
                        </td>
                        <td>{{$value->name}}</td>
                        <td>{{number_format($value->price,0,',','.').'₫'}}</td>
                        <td>
                            <div class="cart_qty">
                                <input type="text" class="quantity_box" name="cart_quantity" value="{{$value->qty}}" size="2">
                                <input type="hidden" value="{{$value->rowId}}" name="rowId_cart" class="form-control">
                            </div>
                        </td>
                        <td>
                        <?php
                        $subtotal = $value->price * $value->qty;
                        echo number_format($subtotal).'₫';
                        ?>
                        </td>
                        <td> <a class="pest_btn" href="{{URL::to('/delete-cart/'.$value->rowId)}}">X</a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit" name="update_qty" class="btn pest_btn">Cập nhật</button>
                        </td>
                    </tr>
                </tbody>
                </form>
            </table>
        </div>
        <div class="row cart_total_inner">
            <div class="col-lg-7"></div>
            <div class="col-lg-5">
                <div class="cart_total_text">
                    <div class="cart_head">
                    Tổng số tiền giỏ hàng
                    </div>
                    <div class="sub_total">
                        <h5>Tổng<span>{{(Cart::pricetotal(0)).'₫'}}</span></h5>
                    </div>
                    <div class="tax sub_total">
                        <h5>Thuế<span>{{(Cart::tax(0)).'₫'}}</span></h5>
                    </div>
                    <div class="transport_fee sub_total">
                        <h5>Phí vận chuyển<span>0đ</span></h5>
                    </div>
                    <div class="total sub_total">
                        <h4>Thành tiền<span>{{(Cart::total(0)).'₫'}}</span></h4>
                    </div>
                    <div class="cart_footer">
                    <?php
                        $customer_id = Session::get('consumer_id');
                        if($customer_id!=NULl) {

                    ?>
                    <a class="pest_btn" href="{{URL::to('/checkout')}}">Thanh toán</a>
                    <?php
                        }else{
                    ?>
                    <a class="pest_btn" href="{{URL::to('login-checkout')}}">Thanh toán</a>
                    <?php
                        }
                    ?>
                    </div>
        		</div>
        	</div>
        </div>
    </div>
</section>
@endsection