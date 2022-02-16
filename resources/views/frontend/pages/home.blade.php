@extends('template')
@section('title', 'Trang chủ')
@section('content')
<!-- Silder Area -->
<section class="main_slider_area">
            <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
                <ul>
                    <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="{{URL::to('/public/frontend/img/slider-3.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{URL::to('/public/frontend/img/slider-2.jpg')}}"  alt="banner1" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                        <!-- LAYER NR. 1 -->
                        <div class="slider_text_box">
                            <div class="tp-caption tp-resizeme first_text" 
                            data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']" 
                            data-y="['top','top','top','top']" data-voffset="['175','175','125','165','160']" 
                            data-fontsize="['65','65','65','40','30']"
                            data-lineheight="['80','80','80','50','40']"
                            data-width="['800','800','800','500']"
                            data-height="none"
                            data-whitespace="normal"
                            data-type="text" 
                            data-responsive_offset="on" 
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['left','left','left','left']">Chất lượng bánh ... <br /> ngọt với , trứng & bánh mì</div>
                            
                            <div class="tp-caption tp-resizeme secand_text" 
                                data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']" 
                                data-y="['top','top','top','top']" data-voffset="['345','345','300','300','250']"  
                                data-fontsize="['20','20','20','20','16']"
                                data-lineheight="['28','28','28','28']"
                                data-width="['640','640','640','640','350']"
                                data-height="none"
                                data-whitespace="normal"
                                data-type="text" 
                                data-responsive_offset="on"
                                data-transform_idle="o:1;"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">Vì không ai coi thường hay ghét bỏ niềm vui vì nó là niềm vui, hoặc xa lánh nó, bởi vì những nỗi đau lớn là kết quả của những người lý trí.
                            </div>
                            
                            <div class="tp-caption tp-resizeme slider_button" 
                                data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']" 
                                data-y="['top','top','top','top']" data-voffset="['435','435','390','390','360']" 
                                data-fontsize="['14','14','14','14']"
                                data-lineheight="['46','46','46','46']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text" 
                                data-responsive_offset="on" 
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                                <a class="main_btn" href="{{URL::to('/product')}}">Xem sản phẩm</a>
                            </div>
                        </div>
                    </li>
                    <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="{{('public/frontend/img/slider-2.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{URL::to('/public/frontend/img/slider-3.jpg')}}"  alt="banner2" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="slider_text_box">
                            <div class="tp-caption tp-resizeme first_text" 
                            data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']" 
                            data-y="['top','top','top','top']" data-voffset="['175','175','125','165','160']" 
                            data-fontsize="['65','65','65','40','30']"
                            data-lineheight="['80','80','80','50','40']"
                            data-width="['800','800','800','500']"
                            data-height="none"
                            data-whitespace="normal"
                            data-type="text" 
                            data-responsive_offset="on" 
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['left','left','left','left']">Bakery Land ... <br /> nơi làm ra những chiếc bánh ngon</div>
                            
                            <div class="tp-caption tp-resizeme secand_text" 
                                data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']" 
                                data-y="['top','top','top','top']" data-voffset="['345','345','300','300','250']"  
                                data-fontsize="['20','20','20','20','16']"
                                data-lineheight="['28','28','28','28']"
                                data-width="['640','640','640','640','350']"
                                data-height="none"
                                data-whitespace="normal"
                                data-type="text" 
                                data-responsive_offset="on"
                                data-transform_idle="o:1;"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                            </div>
                            
                            <div class="tp-caption tp-resizeme slider_button" 
                                data-x="['left','left','left','15','15']" data-hoffset="['0','0','0','0']" 
                                data-y="['top','top','top','top']" data-voffset="['435','435','390','390','360']" 
                                data-fontsize="['14','14','14','14']"
                                data-lineheight="['46','46','46','46']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text" 
                                data-responsive_offset="on" 
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                                <a class="main_btn" href="{{URL::to('/product')}}">Xem sản phẩm</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
<!-- Welcome Area -->
        <section class="welcome_bakery_area">
        	<div class="container">
        		<div class="welcome_bakery_inner p_100">
        			<div class="row">
        				<div class="col-lg-6">
        					<div class="main_title">
								<h2>Chào mừng bạn đến với tiệm bánh của chúng tôi</h2>
								<p>Có phải bạn đang tìm một tiệm bánh có thể cung cấp những sản phẩm ngon, thơm và phù hợp túi tiền bạn hãy đến Bakery Land, bạn sẽ tìm được thứ bạn muốn</p>
							</div>
        					<div class="welcome_left_text">
        						<p>Babery Land là một cửa hàng được thành lập vào năm 2021, tuy chưa đầy đủ kinh nghiệm dằn dặn trong việc quản lý tiệm bánh. Nhưng chúng tôi cam đoan với khách hàng sẽ cho ra những loại sản phẩm an toàn vệ sinh và đáp ứng nhu cầu của khách hàng.</p>
        						<a class="pink_btn" href="{{URL::to('/about')}}">Về chúng tôi</a>
        					</div>
        				</div>
        				<div class="col-lg-6">
        					<div class="welcome_img">
        						<img class="img-fluid" src="{{('public/frontend/img/welcome-right.jpg')}}" alt="">
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="cake_feature_inner">
				<div class="main_title">
						<h2> Bánh đặc trưng của chúng tôi</h2>
					</div>
       				<div class="cake_feature_slider owl-carousel">
						@foreach ($all_product as $key => $homepro)
                        <a href="{{URL::to('/productdetails/'.$homepro->product_id)}}">
       					<div class="item">
       						<div class="cake_feature_item">
       							<div class="cake_img">
       								<img src="{{URL::to('public/uploads/product/'.$homepro->product_img)}}" width="270" height="226" alt="hình">
       							</div>
								<form action="{{URL::to('/add-cart')}}" method="post">
								{{csrf_field()}}
       							<div class="cake_text">
       								<h4>{{number_format($homepro->product_price,0,',','.').'₫'}}</h4>
       								<h3>{{$homepro->product_name}}</h3>
									<input name="productid_hidden" type="hidden" value="{{($homepro->product_id)}}"/>
       								<button class="btn pest_btn">Thêm vào giỏ</button>
								</form>
       							</div>
       						</div>
       					</div>
                        </a>
						@endforeach	
       				</div>
        		</div>
        	</div>
        </section>
<!-- Service Area -->
        <section class="service_area">
        	<div class="container">
        		<div class="single_w_title">
        			<h2>Các dịch vụ mà chúng tôi cung cấp</h2>
        		</div>
        		<div class="row service_inner">
        			<div class="col-lg-4 col-6">
        				<div class="service_item">
        					<i class="flaticon-food-2"></i>
        					<h4>Bánh mặn</h4>
        					<p>Là loại bánh được làm từ bột mì cũng rất đa dạng với nhiều hương vị độc đáo. Đặc biệt là không ngọt và béo</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-6">
        				<div class="service_item">
        					<i class="flaticon-food-1"></i>
        					<h4>Bánh kem</h4>
        					<p>Đây là một loại bánh ngọt dạng tháp như bánh bông lan xốp và được phủ lên một lớp kem dày hoặc mỏng vừa để trang trí vừa để tăng thêm hương vị cho bánh.</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-6">
        				<div class="service_item">
        					<i class="flaticon-food"></i>
        					<h4>Bánh ngọt</h4>
        					<p>Bánh một dạng thức ăn ngọt làm từ bột mì, đường và các thành phần khác, thường được nướng.</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
<!-- Discover Area -->
        <section class="discover_menu_area">
        	<div class="discover_menu_inner">
        		<div class="container">
        			<div class="main_title">
						<h2>Khám phá thực đơn</h2>
						<h5>Biết đâu bạn sẽ món có nguyên liệu ưng ý đấy</h5>
					</div>
       				<div class="row">
					   @foreach ($all_product as $key => $mt)
       					<div class="col-lg-6">
       						<div class="discover_item_inner">
       							<div class="discover_item">
									<h4>{{$mt->product_name}}</h4>
									<p>{{$mt->product_material}} <span>{{number_format($mt->product_price,0,',','.').'₫'}}</span></p>
								</div>
       						</div>
       					</div>
						@endforeach
       				</div>
        		</div>
        	</div>
        </section>
@endsection