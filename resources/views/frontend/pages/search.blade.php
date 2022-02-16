@extends('template')
@section('title', 'Tìm kiếm sản phẩm')
@section('content')
<section class="product_area p_100">
	<div class="container">
		<div class="row product_inner_row">
			<div class="col-lg-9">
                <div class="main_title">
					<h2>Kết quả tìm kiếm</h2>
				</div>
				<div class="row product_item_inner">
				@foreach ($search_product as $key => $product)
				<a href="{{URL::to('/productdetails/'.$product->product_id)}}">
					<div class="col-lg-4 col-md-4 col-6">
						<div class="cake_feature_item">
							<div class="cake_img">
								<img src="{{URL::to('public/uploads/product/'.$product->product_img)}}" alt="product" width="270" height="226">
							</div>
							<form action="{{URL::to('/add-cart')}}" method="post">
							{{csrf_field()}}
							<div class="cake_text">
								<h4>{{number_format($product->product_price,0,',','.').'₫'}}</h4>
								<h3>{{($product->product_name)}}</h3>
								<input name="productid_hidden" type="hidden" value="{{($product->product_id)}}"/>
								<button class="btn pest_btn">Thêm vào giỏ</button>
							</div>
							</form>
						</div>
					</div>
				</a>
				@endforeach
				</div>
			</div>
			<div class="col-lg-3">
				<div class="product_left_sidebar">
					<aside class="left_sidebar search_widget">
						<div class="input-group">
						<form action="{{URL::to('/search')}}" method="post">
							{{csrf_field()}} 
							<input type="text" class="form-control" name="search_submit" placeholder="Nhập tìm kiếm...">
							</form>
							<div class="input-group-append">
								<button class="btn" type="button"><i class="icon icon-Search"></i></button>
							</div>
						</div>
					</aside>
					<aside class="left_sidebar p_catgories_widget">
						<div class="p_w_title">
							<h3>Danh mục sản phẩm</h3>
						</div>
						@foreach($category as $key => $cate)
						<ul class="list_style">
							<li><a href="{{URL::to('/categoryproduct/'.$cate->category_id)}}">{{$cate->category_name}} ({{$cate->Tongsoluong}})</a></li>
						</ul>
						@endforeach
					</aside>
					<aside class="left_sidebar p_sale_widget">
						<div class="p_w_title">
							<h3>Sản phẩm bán chạy</h3>
						</div>
						@foreach($selling_product as $key => $sp)
						<a href="{{URL::to('/productdetails/'.$sp->product_id)}}">
						<div class="media">
							<div class="d-flex">
								<img src="{{URL::to('public/uploads/product/'.$sp->product_img)}}" width="104" height="95" alt="">
							</div>
							<div class="media-body">
								<h4>{{$sp->product_name}}</h4>
								<h5>{{number_format($sp->product_price,0,',','.').'₫'}}</h5>
							</div>
						</div>
						</a>
						@endforeach
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection