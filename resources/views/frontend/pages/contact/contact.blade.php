@extends('template');
@section('title', 'Liên hệ')
@section('content')
<section class="contact_form_area p_100">
        	<div class="container">
        		<div class="main_title">
					<h2>Liên hệ</h2>
					<h5>Bạn có điều gì muốn cho chúng tôi biết không? Vui lòng liên hệ với chúng tôi qua biểu mẫu liên hệ của chúng tôi.</h5>
				</div>
       			<div class="row">
       				<div class="col-lg-7">
       					<form name="contactForm" class="row contact_us_form" action="{{URL::to('/save-contact')}}" method="post" onsubmit="return validateContactForm()">
                           {{csrf_field()}}
							<div class="form-group col-md-6">
								<input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Tên của bạn" onfocusout="c_nameValidaton()">
                                <p id="err_contact_name" style="color:red; font-size:13px;"></p>
							</div>
							<div class="form-group col-md-6">
								<input type="text" class="form-control" id="contact_gmail" name="contact_gmail" placeholder="Địa chỉ email" onfocusout="c_gmailValidation()">
                                <p id="err_contact_gmail" style="color:red; font-size:13px;"></p>
                            </div>
							<div class="form-group col-md-12">
								<input type="text" class="form-control" id="contact_title" name="contact_title" placeholder="Tiêu đề" onfocusout="c_titleValidaton()">
                                <p id="err_contact_title" style="color:red; font-size:13px;"></p>
                            </div>
							<div class="form-group col-md-12">
								<textarea class="form-control" name="contact_content" id="contact_content" rows="1" placeholder="Nhập tin nhắn" onfocusout="c_contentValidaton()"></textarea>
                                <p id="err_contact_content" style="color:red; font-size:13px;"></p>
                            </div>
							<div class="form-group col-md-12">
								<button type="submit" value="submit" class="btn order_s_btn form-control">Gửi ngay</button>
							</div>
						</form>
       				</div>
       				<div class="col-lg-4 offset-md-1">
       					<div class="contact_details">
       						<div class="contact_d_item">
       							<h3>Địa chỉ :</h3>
       							<p>38A, Đường số 3 <br /> Quận Bình Tân, Tp. Hồ Chí Minh</p>
       						</div>
       						<div class="contact_d_item">
       							<h5>Phone : <a href="tel:+84349390596">+84349390596</a></h5>
       							<h5>Email : <a href="mailto:tuananhpham17102000@gmail.com">tuananhpham17102000@gmail.com</a></h5>
       						</div>
       						<div class="contact_d_item">
       							<h3>Giờ mở cửa :</h3>
       							<p>8:00 AM – 8:00 PM</p>
       							<p>Thứ 2 – Thứ 6</p>
                                <p>9:00 AM – 4:00 PM</p>
       							<p>Thứ 7</p>
       						</div>
       					</div>
       				</div>
       			</div>
        	</div>
        </section>
        <!--================End Contact Form Area =================-->
        
        <!--================End Banner Area =================-->
        <section class="map_area">
			<div class="container">
				<div class="row">
					<div class="col">
					<div id="mapBox" class="mapBox d-flex justify-content-center">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3620230149863!2d106.61538731432039!3d10.783559992316695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752c0559c7e965%3A0xf1d81543fe7e979e!2zMzhBIMSQxrDhu51uZyBz4buRIDMsIELDrG5oIEjGsG5nIEhvw6AgQSwgQsOsbmggVMOibiwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1632389908702!5m2!1svi!2s" width="1000px" height="450" allowfullscreen="" loading="lazy"></iframe>
					</div>
					</div>
				</div>
			</div>
		</section>
@endsection