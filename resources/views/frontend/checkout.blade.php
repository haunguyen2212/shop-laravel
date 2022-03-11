@extends('layout.master')
@section('title', 'Thanh toán')

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

  <div class="container-fluid mt-1">
    <div class="row g-5">
      <div class="col-md-6 col-lg-4 order-md-last pe-0">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-danger fw-bold">Giỏ hàng</span>
          <span class="badge bg-danger rounded-pill">{{ $carts->count() }}</span>
        </h4>
        <ul class="list-group mb-3">

          @foreach ($carts as $cart)
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">{{ $cart->name }}</h6>
                <small class="text-muted">{{ $cart->options->color.' x'.$cart->qty }}</small>
              </div>
              <span class="text-muted">{{ number_format($cart->price*$cart->qty) }}</span>
            </li>
          @endforeach
          
          <li class="list-group-item d-flex justify-content-between">
            <span class="text-danger fw-bold">Tổng thanh toán</span>
            <strong>{{ $total }}</strong>
          </li>
        </ul>
      </div>

      <div class="col-md-6 col-lg-8 ps-0">
        <h4 class="mb-3 text-danger fw-bold">Thông tin khách hàng</h4>
        <form action="{{ route('checkout.post') }}" method="post">
          <div class="row g-3 ">

            @csrf
            <input type="text" class="form-control" name="orderId" value="{{ md5(uniqid(rand(), true)) }}">

            <div class="col-sm-6">
              <label for="firstName" class="form-label fw-bold">Họ:</label>
              <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">
              @error('firstName')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label fw-bold">Tên:</label>
              <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}">
              @error('lastName')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>


            <div class="col-12">
              <label for="email" class="form-label fw-bold">Số điện thoại:</label>
              <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
              @error('phone')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>

            <div class="col-md-4">
              <label for="country" class="form-label fw-bold">Tỉnh, thành phố</label>
              <select class="form-select" id="province" name="province">
                <option value="">Chọn tỉnh</option>

                @foreach ($provinces as $province)
                  <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach

              </select>
              @error('province')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label fw-bold">Quận, huyện</label>
              <select class="form-select" id="district" name="district">
                <option value="">Chọn quận, huyện</option>
              </select>
              @error('district')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label fw-bold">Xã, phường</label>
              <select class="form-select" id="ward" name="ward">
                <option value="">Chọn xã</option>
              </select>
              @error('ward')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>

            <div class="col-12">
              <label for="address" class="form-label fw-bold">Địa chỉ giao hàng:</label>
              <input type="text" class="form-control" name="address" placeholder="Nhập số nhà, số đường" value="{{ old('phone') }}">
              @error('address')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-danger btn-lg" type="submit">Đặt hàng ngay</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script>
      $('#province').change(function(){
        var id = $('#province').val();
        $.get(
        '{{ route('district') }}',
        {id: id},
        function(data){
          $('#district').html(data);
          $('#ward').html('<option value="">Chọn xã</option>');
        }
        );
      });

      $('#district').change(function(){
        var id = $('#district').val();
        $.get(
        '{{ route('ward') }}',
        {id: id},
        function(data){
          $('#ward').html(data);
        }
        );
      });
    </script>
@endsection