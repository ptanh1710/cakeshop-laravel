@extends('template');
@section('title', 'Tài khoản')
@section('content')

<section class="contact_form_area p_100">
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng nhập</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Đăng ký</label>
		<div class="login-form">
			<div class="sign-in-htm">
			<?php
				$message = Session::get('message');
				if($message){
					echo '<p style="color:red; font-size:13px;">'.$message.'</p>';
					$message = session()->put('message',null);
				}
			?>
			<form name="loginForm" action="{{URL::to('/login-customer')}}" method="POST" onsubmit="return validateContactForm()">
				{{csrf_field()}}
				<div class="group">
					<label class="label">Tên tài khoản</label>
					<input type="text" name="account_gmail" id="login_email" class="input" placeholder="Nhập tài khoản email..." onfocusout="l_emailValidation()">
					<p id="err_login_email" style="color:red; font-size:13px;"></p>
				</div>
				<div class="group">
					<label for="pass" class="label">Mật khẩu</label>
					<input id="login_password" type="password" class="input" name="account_password" onfocusout="l_passwordValidation()" placeholder="Nhập mật khẩu...">
					<p id="err_login_password" style="color:red; font-size:13px;"></p>
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Ghi nhớ đăng nhập</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Đăng nhập">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#">Quên mật khẩu?</a>
				</div>
			</form>
			</div>
			<div class="sign-up-htm">
				<form name="registerForm" action="{{URL::to('/register-customer')}}" method="POST" onsubmit="return validateRegisterForm()">
				{{csrf_field()}}
				<div class="group">
					<label class="label">Họ và tên</label>
					<input id="register_fullname" type="text" class="input" name="consumer_name" onfocusout="r_fullnameValidaton()">
					<p id="err_register_fullname" style="color:red; font-size:13px;"></p>
				</div>
				<div class="group">
					<label class="label">Địa chỉ email</label>
					<input id="register_email" type="text" class="input" name="consumer_gmail" onfocusout="r_emailValidation()">
					<p id="err_register_email" style="color:red; font-size:13px;"></p>
				</div>
				<div class="group">
					<label class="label">Mật khẩu</label>
					<input id="register_password" type="password" class="input" name="consumer_password" onfocusout="r_passwordValidation()">
					<p id="err_register_password" style="color:red; font-size:13px;"></p>
				</div>
				<div class="group">
					<label class="label">Nhập lại mật khẩu</label>
					<input id="register_repassword" type="password" class="input" onfocusout="repasswordValidation()">
					<p id="err_register_repassword" style="color:red; font-size:13px;"></p>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Đăng ký">
				</div>
				</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Bạn đã có tài khoản?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection