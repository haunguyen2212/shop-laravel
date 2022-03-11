@extends('layout.master')

@section('title','Thanh toán vnpay')

@section('style')
<link rel="stylesheet" type="text/css" href="css/vnpay.css">
@endsection

@section('content')
<div id="breadcrumb" class="col-md-12">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="{{ route('cart.show') }}">Giỏ hàng</a></li>
			<li class="breadcrumb-item active" aria-current="page">Thanh toán VNPAY</li>
		</ol>
	</nav>
</div>
<div id="wrap-inner">
	
	<div class="row">	
		<div class="col-md-7 col-sm-6">
			<div class="caption">Thanh toán VNPAY</div>   
			<form action="{{ route('vnpay.post') }}" method="post"> 
				@csrf        		      
				<div class="form-group">
					<label class="form-label fw-bold mt-2">Loại hàng hóa </label>
					<select name="order_type" id="order_type" class="form-select">						
						<option value="billpayment">Thanh toán hóa đơn</option>						
					</select>
				</div>
				<div class="form-group">
					{{-- <label class="form-label fw-bold mt-2">Mã hóa đơn</label> --}}
					<input class="form-control" id="order_id" name="order_id" type="hidden" value="{{ $orderId }}"/>
				</div>
				<div class="form-group">
					{{-- <label class="form-label fw-bold mt-2">Số tiền</label> --}}
					<input id="amount" name="amount" type="hidden" value="{{ $total }}"/>

				</div>								
				<div class="form-group">
					<label class="form-label fw-bold mt-2">Ngân hàng</label>
					<select name="bank_code" id="bank_code" class="form-select">
						<option value="">Không chọn</option>
						<option value="NCB"> Ngan hang NCB</option>
						<option value="AGRIBANK"> Ngan hang Agribank</option>
						<option value="SCB"> Ngan hang SCB</option>
						<option value="SACOMBANK">Ngan hang SacomBank</option>
						<option value="EXIMBANK"> Ngan hang EximBank</option>
						<option value="MSBANK"> Ngan hang MSBANK</option>
						<option value="NAMABANK"> Ngan hang NamABank</option>
						<option value="VNMART"> Vi dien tu VnMart</option>
						<option value="VIETINBANK">Ngan hang Vietinbank</option>
						<option value="VIETCOMBANK"> Ngan hang VCB</option>
						<option value="HDBANK">Ngan hang HDBank</option>
						<option value="DONGABANK"> Ngan hang Dong A</option>
						<option value="TPBANK"> Ngân hàng TPBank</option>
						<option value="OJB"> Ngân hàng OceanBank</option>
						<option value="BIDV"> Ngân hàng BIDV</option>
						<option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
						<option value="VPBANK"> Ngan hang VPBank</option>
						<option value="MBBANK"> Ngan hang MBBank</option>
						<option value="ACB"> Ngan hang ACB</option>
						<option value="OCB"> Ngan hang OCB</option>
						<option value="IVB"> Ngan hang IVB</option>
						<option value="VISA"> Thanh toan qua VISA/MASTER</option>
					</select>
				</div>
				<div class="form-group">
					<label for="language" class="form-label fw-bold mt-2">Ngôn ngữ</label>
					<select name="language" id="language" class="form-select">
						<option value="vn">Tiếng Việt</option>
						<option value="en">English</option>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label fw-bold mt-2">Nội dung thanh toán</label>
					<textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="3">Nội dung thanh toán</textarea>
				</div>

				<button type="submit" name="redirect" id="redirect" class="w-100 btn btn-primary btn-lg mt-3">Thanh toán ngay</button>
			</form>
		</div>
		
	</div>
	
</div>

@endsection