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
        
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th width="5%">STT</th>
              <th width="15%">Mã đơn hàng</th>
              <th width="10%">Ngày đặt</th>
              <th width="10%">Tổng tiền</th>
              <th width="20%">Trạng thái</th>
              <th width="20%">Tình trạng</th>
              <th width="20%">Tùy chọn</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($orders as $key => $order)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $order->order_id }}</td>
              <td>{{ date("d/m/Y H:i:s", strtotime($order->order_date)) }}</td>
              <td><span class="fw-bold text-danger">{{ number_format($order->total) }}đ</span></td>
              <td>
                @if ($order->payment_status == 0)
                  <span class="text-danger">Chưa thanh toán</span>
                @else
                  <span class="text-primary">Đã thanh toán</span>
                @endif
              </td>
              <td>
                @if ($order->order_status == 0)
                  <span class="text-danger">Chưa nhận hàng</span>
                @else
                  <span class="text-primary">Đã nhận hàng</span>
                @endif
              </td>
              <td><a href="{{ route('orderDetail',['id' => $order->order_id]) }}" class="text-success">Xem chi tiết</a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="js/toastr.min.js"></script>
  {!! Toastr::message() !!}
@endsection

