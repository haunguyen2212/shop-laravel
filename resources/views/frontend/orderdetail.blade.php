@extends('layout.master')

@section('title','Chi tiết đơn hàng')

@section('style')
    <link rel="stylesheet" href="css/orderdetail.css">
    <link rel="stylesheet" href="css/toastr.min.css">
@endsection

@section('content')

    <div id="breadcrumb" class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile') }}">Thông tin tài khoản</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
            </ol>
        </nav>
    </div>

    <div id="wrap-inner" class="row">
        <div class="col-md-12">
            <div class="product-caption">Chi tiết đơn hàng</div>
            @if (isset($order))
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

                    </div> 
                    
                    @if (isset($details) && $details->count())
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="25%">Tên sản phẩm</th>
                                    <th width="20%">Hình ảnh</th>
                                    <th width="10%">Số lượng</th>
                                    <th width="20%">Đơn giá</th>
                                    <th width="20%">Thành tiền</th>       
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $key => $detail)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $detail->product_name.' ('.$detail->color.')' }}</td>
                                    <td><img width="100px" src="img/product_detail/{{ $detail->product_detail_image }}" alt="{{ $detail->product_name }}"></td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ number_format($detail->amount) }}</td>
                                    <td>{{ number_format($detail->amount*$detail->quantity) }}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td class="last-col" colspan="6">Tổng cộng: <span>{{ number_format($order->total) }} VND</span></td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                    <div class="order-footer">

                        @if ($order->payment_status == 0)
                            <a href="{{ route('order.cancel', ['id' => $order->order_id]) }}" class="text-danger"><i class="fas fa-times"></i> Hủy đơn hàng</a>&emsp;
                            <a href="{{ route('vnpay', ['id' => $order->order_id]) }}" class="text-primary"><i class="fas fa-credit-card"></i> Thanh toán online</a>
                        @endif
       
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    {!! Toastr::message() !!}
@endsection