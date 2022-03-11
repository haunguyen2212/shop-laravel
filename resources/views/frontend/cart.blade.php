@extends('layout.master')
@section('title','Giỏ hàng')
@section('style')
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="css/toastr.min.css">
@endsection

@section('content')

  <div id="breadcrumb" class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
      </ol>
    </nav>
  </div>

  <div class="product-caption">GIỎ HÀNG CỦA BẠN</div>

  @if(!isset($carts) || $carts->count() == 0)
    <div id="empty-cart">
      <div class="empty-cart-img">
        <img width="30%" src="img/img-cart-empty.png">
      </div>
      <div class="empty-cart-text">Không có sản phẩm nào trong giỏ hàng</div>
      <div class="empty-cart-link">
        <a class="btn btn-sm" href="{{ route('home') }}">VỀ TRANG CHỦ</a>
      </div>
    </div>

  @else
    <div class="table-responsive" id="shoppingcart">
      <table class="table table-borderless table-bordered">
        <thead>
          <tr>
            <th width="5%">STT</th>
            <th width="20%">Tên sản phẩm</th>
            <th width="20%">Hình ảnh</th>
            <th width="15%">Đơn giá</th>
            <th width="15%">Số lượng</th>
            <th width="15%">Thành tiền</th>
            <th width="10%">Xóa</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($carts as $cart)
          <tr>
            <td>{{ $number++ }}</td>
            <td>{{ $cart->name }} ({{ $cart->options->color }})</td>
            <td><img src="img/product_detail/{{ $cart->options->image }}" alt="{{ $cart->name }}"></td>
            <td>{{ number_format($cart->price) }}</td>
            <td> <input type="number" class="update-cart" min="1" max="{{ $cart->options->max_qty }}" value="{{ ($cart->qty < $cart->options->max_qty) ? $cart->qty : $cart->options->max_qty }}" onchange="updateCart(this.value,'{{ $cart->rowId }}')"></td>
            <td>{{ number_format($cart->price*$cart->qty) }}</td>
            <td><a href="{{ route('cart.delete', ['rowId' => $cart->rowId ]) }}"><i class="fas fa-times"></i></a></td>
          </tr>
          @endforeach

          <tr id="total">
            <td colspan="7">Tổng cộng:<span> {{ $total }} VND</span></td>
          </tr>

        </tbody>
      </table>
      <div class="d-flex float-end">
        
        <a class="btn btn-sm btn-success ms-1" href="{{ route('checkout') }}">Đặt hàng</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#destroyCart">
          Xóa tất cả
        </button>

        <!-- Modal -->
        <div class="modal fade" id="destroyCart" tabindex="-1" aria-labelledby="destroyCartLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fw-bold text-danger" id="destroyCartLabel"><i class="fas fa-exclamation-triangle"></i> Cảnh Báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Thao tác này sẽ xóa toàn bộ giỏ hàng. Bạn có chắc muốn xóa toàn bộ giỏ hàng của mình không?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Không</button>
                <a href="{{ route('cart.destroy') }}" class="btn btn-sm btn-primary">Đồng ý</a>
              </div>
            </div>
          </div>
        </div>
        <a class="btn btn-sm btn-primary ms-1" href="{{ route('home') }}">Tiếp tục mua hàng</a>
      </div>
    </div>
  @endif

@endsection

@section('script')
  <script type="text/javascript" src="js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script>
    function updateCart(qty,rowId){
      $.get(
        '{{ route('cart.update') }}',
        {qty:qty,rowId:rowId},
        function(){
          location.reload();
        }
        );
    }
  </script>

@endsection




