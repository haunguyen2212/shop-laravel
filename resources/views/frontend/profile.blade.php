@extends('layout.master')
@section('title','Lịch sử mua hàng')

@section('style')
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/toastr.min.css">
@endsection

@section('content')

<div id="breadcrumb" class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
      </ol>
    </nav>
  </div>

<div id="wrap-inner">
    <div class="product-caption">Thông tin khách hàng</div>
    <div class="row">
      <div class="col-md-8">
        <div id="profile">
          <div>Tài khoản: <span>{{ $user->username }}</span></div>
          <div>Họ và tên: <span>{{ $user->name }}</span></div>
          <div>Email: <span>{{ $user->email }}</span></div>
          <div>Ngày tạo: <span>{{  date("d/m/Y", strtotime($user->created_at)) }}</span></div>
        </div>
      </div>
      <div class="col-md-12" id="history">
        <div class="product-caption">Lịch sử đặt hàng</div>
        
        @foreach ($orders as $order)
            <div class="order mb-4">
                <div class="order-info">
                <div>Mã đơn hàng: <span>{{ $order->order_id }}</span></div>
                <div>Ngày đặt hàng: <span>{{ date("d/m/Y H:i:s", strtotime($order->order_date)) }}</span></div>
                <div>Ngày giao hàng (dự kiến): <span>{{ date("d/m/Y H:i:s", strtotime($order->delivery_date)) }}</span></div>
                <div>Tổng thanh toán: <span class="fw-bold text-danger">{{ number_format($order->total) }}đ</span></div>
                <div>Hình thức thanh toán: <span>{{ $order->payment_type }}</span></div>
                
                @if ($order->payment_status == 0)
                  <div>Trạng thái thanh toán: <span class="text-danger">Chưa thanh toán</span></div>
                @else
                  <div>Trạng thái thanh toán: <span class="text-primary">Đã thanh toán</span></div>
                @endif

                @if ($order->order_status == 0)
                  <div>Tình trạng: <span class="text-danger">Chưa nhận hàng</span></div>
                @else
                  <div>Tình trạng: <span class="text-primary">Đã nhận hàng</span></div>
                @endif

                <div><a href="{{ route('orderDetail',['id' => $order->order_id]) }}" class="text-primary">Xem chi tiết</a></div>
                </div> 
            </div>
            <hr>
        @endforeach

      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="js/toastr.min.js"></script>
  {!! Toastr::message() !!}
@endsection

