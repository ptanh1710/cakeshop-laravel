@extends('template')
@section('content')
<section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<!-- <h3>Shop</h3> -->
        			<ul>
        				<!-- <li><a href="index.html">Home</a></li>
        				<li><a href="shop.html">Shop</a></li> -->
        			</ul>
        		</div>
        	</div>
</section>
@foreach ($product_details as $key => $details)
<section class="product_details_area p_100">
        	<div class="container">
			<div class="main_title">
	<h2>Chi tiết sản phẩm</h2>
        </div>
        		<div class="row product_d_price">
        			<div class="col-lg-6">
        				<div class="product_img"><img class="img-fluid" src="{{URL::to('public/uploads/product/'.$details->product_img)}}" width="525" height="426" alt=""></div>
        			</div>
        			<div class="col-lg-6">
        				<div class="product_details_text">
        					<h4>{{($details->product_name)}}</h4>
        					<p>{{($details->product_material)}}</p>
							<form action="{{URL::to('/save-cart')}}" method="POST">
								{{ csrf_field() }}
							<span>
								<h5>Giá bán :<span>{{number_format($details->product_price,0,',','.').'₫'}}</span></h5>
								<div class="quantity_box">
									<label>Số lượng :</label>
									<input type="number" name="qty" min="1" max="{{($details->product_amount)}}" value="1"/>
									<input name="productid_hidden" type="hidden" value="{{($details->product_id)}}"/>
								</div>
								<button type="submit"class="btn pink_more">Thêm vào giỏ</button>
							</span>
							</form>
        				</div>
        			</div>
        		</div>
        		<div class="product_tab_area">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Chi tiết sản phẩm</a>
							<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Đánh giá</a>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<textarea class="form-control" style="border:none; outline:none;" rows="12" readonly>{{($details->product_desc)}}</textarea>
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<p><span style="font-weight:bold">Tên sản phẩm:</span> <span>{{($details->product_name)}}</span></p>
						<p><span style="font-weight:bold">Loại sản phẩm:</span> <span>{{$details->category_name}}</span></p>
						<p><span style="font-weight:bold">Nhà cung cấp:</span>  <span>{{$details->provider_name}}</span></p>
						<p><span style="font-weight:bold">Ngày nhập hàng:</span> <span>{{\Carbon\Carbon::parse($details->product_date)->format('d/m/Y')}}</span></p>

						</div>
						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
							<p>Coming Soon</p>
						</div>
					</div>
        		</div>
        	</div>
</section>
@endforeach
<section class="similar_product_area p_100">
    <div class="container">
        <div class="main_title">
        	<h2>Sản phẩm liên quan</h2>
        </div>
        	<div class="row similar_product_inner">
				@foreach($relate as $key =>$splq)
        		<div class="col-lg-3 col-md-4 col-6">
        			<div class="cake_feature_item">
						<div class="cake_img">
							<img src="{{URL::to('public/uploads/product/'.$splq->product_img)}}" width="270" height="226" alt="">
						</div>
						<div class="cake_text">
							<h4>{{number_format($splq->product_price).'₫'}}</h4>
							<h3>{{($splq->product_name)}}</h3>
							<button  class="btn pest_btn" href="#">Thêm vào giỏ</button>
						</div>
					</div>
        		</div>
				@endforeach
        	</div>
    </div>
</section>
