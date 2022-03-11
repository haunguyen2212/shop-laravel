@extends('layout.master')

@section('title','Hoàn thành')

@section('style')
<link rel="stylesheet" href="css/complete.css">
@endsection

@section('content')

<div id="breadcrumb" class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('cart.show') }}">Giỏ hàng</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
      </ol>
    </nav>
  </div>
  
<div id="wrap-inner">
	<div id="complete">
		<p class="info">Quý khách đã đặt hàng thành công!</p>
		<p>Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
		<p>Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
		<p>Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
		<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
	</div>
	<p class="text-right return"><a href="{{ route('profile') }}">Lịch sử mua hàng</a></p>
	@if (session('error'))
		<div id="fail">
			<p>{{ session('error') }}</p>
		</div>
	@endif
	
</div>
@endsection
