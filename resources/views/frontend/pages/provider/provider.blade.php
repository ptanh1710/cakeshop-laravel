@extends('template')
@section('title', 'Nhà cung cấp')
@section('content')
<section class="contact_form p_100">
    <div class="container">
        <div class="main_title">
			<h2>Nhà cung cấp</h2>
		</div>
        <div class="row">
            @foreach($all_provider as $key => $provider)
            <div class="col-lg-4 col-sm-6">
            <div class="providerBox">
                <h3>{{$provider->provider_name}}</h3>
                <p><span style="color:red; font-weight:bold;">Số điện thoại: </span>{{$provider->provider_phone}}</p>
                <p><span style="color:red; font-weight:bold;">Địa chỉ: </span>{{$provider->provider_address}}</p>
                <p><span style="color:red; font-weight:bold;">Email: </span>{{$provider->provider_gmail}}</p>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection