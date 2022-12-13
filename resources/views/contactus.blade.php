@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div id="menu-overlay" class=""></div>
<section class="bread-crumb margin-bottom-10">
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<li class="home">
				<a itemprop="url" href="{{route('home')}}" title="Trang chủ"><span itemprop="title">Trang chủ</span></a>						
				<span><i class="fa fa-angle-right"></i></span>
			</li>
			<li><strong itemprop="title">Liên hệ</strong></li>
			</ul>
		</div>
	</div>
</div>
</section>
<div class="container contact page-contact">
<div class="row">
	<div class="col-md-12">
		<div class="border-bg clearfix">
			<div class="col-md-3 col-md-push-9">
			<div class="widget-item info-contact in-fo-page-content">
				<div class="logos text-xs-left">
					<a href="{{route('home')}}" class="logo-wrapper ">					
					<img src="{{$setting->logo}}" alt="{{$setting->company}}" class="img-responsive" />					
					</a>
				</div>
				<p>{{$setting->webname}}</p>
				<!-- End .widget-title -->
				<ul class="widget-menu contact-info-page">
					<li><i class="fa fa-map-marker color-x" aria-hidden="true"></i>{{$setting->address1}}</li>
					<li><i class="fa fa-phone color-x" aria-hidden="true"></i> <a href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a></li>
					@if ($setting->phone2)
					<li><i class="fa fa-phone color-x" aria-hidden="true"></i> <a href="tel:{{$setting->phone2}}">{{$setting->phone2}}</a></li>
					@endif
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:{{$setting->email}}">{{$setting->email}}</a></li>
				</ul>
				<!-- End .widget-menu -->
			</div>
			</div>
			<div class="col-md-9 col-md-pull-3">
			<div class="page-login">
				<div id="login">
					<h1 class="title-head">Liên hệ</h1>
					<span class="margin-bottom-10 block">Bạn hãy điền nội dung tin nhắn vào form dưới đây và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi nhận được.</span>
					<form accept-charset="utf-8" action="{{route('postcontact')}}" id="contact" method="post">
						@csrf
						<div class="form-signup clearfix">
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<fieldset class="form-group">
									<label>Họ tên<span class="required">*</span></label>
									<input type="text" name="name" id="name" class="form-control  form-control-lg" data-validation-error-msg= "Không được để trống" data-validation="required" required />
								</fieldset>
							</div>
							<div class="col-sm-6 col-xs-12">
								<fieldset class="form-group">
									<label>Số điện thoại<span class="required">*</span></label>
									<input type="text" name="phone" class="form-control form-control-lg" id="email" data-validation-error-msg= "Không được để trống" data-validation="required" required />
								</fieldset>
							</div>
							<div class="col-sm-12 col-xs-12">
								<fieldset class="form-group">
									<label>Email<span class="required">*</span></label>
									<input type="email" name="email" data-validation="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" data-validation-error-msg= "Email sai định dạng" id="email" class="form-control form-control-lg" required />
								</fieldset>
							</div>
							<div class="col-sm-12 col-xs-12">
								<fieldset class="form-group">
									<label>Nội dung<span class="required">*</span></label>
									<textarea name="mess" id="comment" class="form-control form-control-lg" rows="5" data-validation-error-msg= "Không được để trống" data-validation="required" required></textarea>
								</fieldset>
								<div class="pull-xs-left" style="margin-top:20px;">
									<button type="submit" class="btn btn-blues btn-style btn-style-active">Gửi tin nhắn</button>
								</div>
							</div>
						</div>
						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="border-bg clearfix margin-top-20">
			<div class="box-maps">
			{!!$setting->iframe_map!!}
			</div>
		</div>
	</div>
</div>
</div>
<style>
.box-maps{height: 350px;}
footer.footer-other{margin-top:0;}
.search-more{margin-top:0;}
</style>
@endsection