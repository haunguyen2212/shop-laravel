@extends('layout.master')

@section('title','Tìm kiếm')

@section('style')
  <link rel="stylesheet" href="css/search.css">
@endsection

@section('content')
  <div id="wrap-inner">
    <div class="product">
      <div class="product-search">Kết quả tìm kiếm cho: <span>'{{ $key }}'</span></div>
      <div class="row product-list">
        @foreach ($products as $product)
          <div class="col-lg-3 col-md-4 col-sm-6 product-item">
            <a href="{{ route('product.detail', ['product_slug' => $product->product_slug ]) }}">
              <div class="product-img">

                @if ($product->product_discount != 0)
                  <div class="tag-sale">Giảm {{ number_format($product->product_price*$product->product_discount) }}</div>
                @endif
                
                <img src="img/product/{{ $product->product_image }}">
              </div>
              <div class="product-name">{{ $product->product_name }}</div>
              <div class="price">

                @if ($product->product_discount != 0)
                  <div class="product-discount">{{ number_format($product->product_price) }}</div>
                @endif

                <div class="product-price">{{ number_format($product->product_price-$product->product_discount*$product->product_price) }}</div>
              </div>
            </a>
          </div>
        @endforeach
        
      </div>
    </div>
    {{-- <div id="pagination" class="pagination justify-content-center">{{$products->links()}}</div> --}}
  </div>
@endsection