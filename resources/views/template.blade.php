<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{URL::to('/public/frontend/img/fav-icon.png')}}" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title')</title>
        <!-- Icon css link -->
        <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/vendors/linearicons/style.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/vendors/flat-icon/flaticon.css')}}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="{{asset('public/frontend/vendors/revolution/css/settings.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/vendors/revolution/css/layers.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/vendors/revolution/css/navigation.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/vendors/animate-css/animate.css')}}" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="{{asset('public/frontend/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/vendors/magnifc-popup/magnific-popup.css')}}" rel="stylesheet">
        
        <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
		<link href="{{asset('public/frontend/css/login-checkout.css')}}" rel="stylesheet">
    </head>
    <body>
	<?php echo Cart::count()?>   
        <!--================Main Header Area =================-->
		<header class="main_header_area">
			<div class="top_header_area row m0">
				<div class="container">
					<div class="float-left">
						<a href="tell:+84966949821"><i class="fa fa-phone" aria-hidden="true"></i>+84966949821</a>
						<a href="mainto:vothanhphat2000@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>vothanhphat2000@gmail.com</a>
					</div>
					<div class="float-right">
						<ul class="h_social list_style">
							<?php
								$customer_id = Session::get('consumer_id');
								$customer_name = Session::get('consumer_name');
								if($customer_id!=NULl) {

							?>
							<li class="dropdown submenu">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo "$customer_name" ?></a>
								<ul class="dropdown-menu">
									<li><a href="{{URL::to('/accountinf')}}"><span class="menu_acc" style="color:pink; font-size:14px;"><i class="fa fa-user"></i> Thông tin tài khoản</span></a></li>
									<li><a href="{{URL::to('/logout-checkout')}}"><span class="menu_acc" style="color:pink; font-size:14px"><i class="fa fa-sign-out"></i> Đăng xuất</span></a></li>
								</ul>
							</li>
							<?php
								}else{
							?>
							<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
							<?php
								}
							?>
							<?php
								$customer_id = Session::get('consumer_id');
								$shipping_id = Session::get('shipping_id');
								if($customer_id!=NULL && $shipping_id==NULL) {

							?>
							<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-credit-card"></i> Thanh toán</a></li>
							<?php
								}else{
							?>
							<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-credit-card"></i> Thanh toán</a></li>
							<?php
								}
							?>
						</ul>
						<ul class="h_search list_style">
							<li class="shop_cart">
								<a href="{{URL::to('/show-cart')}}">
									<span class="box_count">{{Cart::count()}}</span>
									<i class="lnr lnr-cart"></i>
								</a>
							</li>
							<li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_menu_area">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="{{URL::to('/home')}}">
						<img src="{{URL::to('/public/frontend/img/logo.png')}}" width="121" height="73" alt="">
						<img src="{{URL::to('/public/frontend/img/logo-2.png')}}" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li><a href="{{URL::to('/home')}}">Trang chủ</a></li>
								<li><a href="{{URL::to('/product')}}">Sản phẩm</a></li>
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Thông tin cửa hàng</a>
									<ul class="dropdown-menu">
										<li><a href="{{URL::to('/about')}}">Về chúng tôi</a></li>
									</ul>
								</li>
							</ul>
							<ul class="navbar-nav justify-content-end">
								<li><a href="{{URL::to('/provider')}}">Nhà cung cấp</a></li>
								<li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
								<li><a href="{{URL::to('/contact')}}">Liên hệ chúng tôi</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>
		<!-- Content -->
		@yield('content')
        <!--================Newsletter Area =================-->
        <section class="newsletter_area">
        	<div class="container">
        		<div class="row newsletter_inner">
        			<div class="col-lg-6">
        				<div class="news_left_text">
        					<h4>Nhập email để tham gia để nhận được các ưu đãi, tin tức và các lợi ích khác <!--  --></h4>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="newsletter_form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Nhập địa chỉ Email">
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="button">Đăng ký ngay</button>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Newsletter Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="footer_widgets">
        		<div class="container">
        			<div class="row footer_wd_inner">
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_about_widget">
							<img src="{{URL::to('/public/frontend/img/logo-2.png')}}" alt="">
        						<p>Babery Land thiên đường của bánh ngọt và bánh mặn, ở đây chúng tôi sẽ luôn cung cấp cho khách hàng những dịch vụ tốt nhất.<table></table></p>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_link_widget">
        						<div class="f_title">
        							<h3>Liên kết nhanh</h3>
        						</div>
        						<ul class="list_style">
								<?php
									if($customer_id !=NULL) {

								?>
        							<li><a href="{{URL::to('/accountinf')}}">Thông tin tài khoản</a></li>
								<?php
									}else {
								?>
									<li><a href="{{URL::to('/login-checkout')}}">Thông tin tài khoản</a></li>
								<?php
									}
								?>
        							<li><a href="#">Xem đơn đặt hàng</a></li>
        							<li><a href="#">Chính sách bảo mật</a></li>
        							<li><a href="#">Điều khoản & Điều kiện</a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_link_widget">
        						<div class="f_title">
        							<h3>Thời gian làm việc</h3>
        						</div>
        						<ul class="list_style">
        							<li><a href="#">Thứ 2 - 6: 8 am - 8 pm</a></li>
        							<li><a href="#">Thứ 7: 9am - 4pm</a></li>
        							<li><a href="#">Chủ nhật: Đóng cửa</a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_contact_widget">
        						<div class="f_title">
        							<h3>Thông tin liên lạc</h3>
        						</div>
        						<h4>+84966949821</h4>
        						<p>Babery Land <br />38A, Đường số 3, Phường Bình Hưng Hòa A ,Quận Bình Tân, Tp. Hồ Chí Minh</p>
        						<h5>vothanhphat2000@gmail.com</h5>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="footer_copyright">
        		<div class="container">
        			<div class="copyright_inner">
        				<div class="float-right">
        					<a href="{{URL::to('/product')}}">Mua ngay</a>
        				</div>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        <!--================Search Box Area =================-->
        <div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
            <div class="search_box_inner">
                <h3>Search</h3>
                <div class="input-group">
				<form action="{{URL::to('/search')}}" method="post">
					{{csrf_field()}} 
                    <input type="text" class="form-control" name="search_submit" placeholder="Search for...">
				</form>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <!--================End Search Box Area =================-->
        
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{asset('public/frontend/js/jquery-3.2.1.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <!-- Rev slider js -->
        <script src="{{asset('public/frontend/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <!-- Extra plugin js -->
        <script src="{{asset('public/frontend/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/magnifc-popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/datetime-picker/js/moment.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/datetime-picker/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('public/frontend/vendors/lightbox/simpleLightbox.min.js')}}"></script>
        
        <script src="{{asset('public/frontend/js/theme.js')}}"></script>
		<script src="{{asset('public/frontend/js/modal.js')}}"></script>
		<script src="{{asset('public/frontend/js/validationform.js')}}"></script>
		<!-- <script src="{{asset('public/frontend/js/datepicker.js')}}"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  		<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
		
  		<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    </body>

</html>