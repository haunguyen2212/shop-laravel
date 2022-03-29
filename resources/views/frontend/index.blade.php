@extends('layout.master')

@section('title','Trang chủ')

@section('content')
	<div id="wrap-inner">
              <div class="product">
                <div class="product-caption">Sản phẩm nổi bật</div>
                <div class="row product-list">

                  @foreach($mainProducts as $mainProduct)
                  <div class="col-lg-3 col-md-4 col-sm-6 product-item">
                    <a href="{{ route('product.detail', ['product_slug' => $mainProduct->product_slug ]) }}">

                      <div class="product-img">

                        @if($mainProduct->product_discount != 0)
                          <div class="tag-sale">Giảm {{number_format($mainProduct->product_price*$mainProduct->product_discount)}}đ</div>
                        @endif
                        <img src="img/product/{{$mainProduct->product_image}}">

                      </div>
                      <div class="product-name">{{$mainProduct->product_name}}</div>
                      <div class="price">

                        @if($mainProduct->product_discount != 0)
                          <div class="product-discount">{{number_format($mainProduct->product_price)}}</div>
                        @endif

                        <div class="product-price">{{number_format($mainProduct->product_price-($mainProduct->product_price*$mainProduct->product_discount))}}</div>
                      </div>
                    </a>
                  </div>
                  @endforeach

                </div>
              </div>

              <div class="product">
                <div class="product-caption">Sản phẩm mới</div>
                <div class="row product-list">

                  @foreach($newProducts as $newProduct)
                  <div class="col-lg-3 col-md-4 col-sm-6 product-item">
                    <a href="{{ route('product.detail', ['product_slug' => $newProduct->product_slug ]) }}">

                      <div class="product-img">
                        @if($newProduct->product_discount != 0)
                          <div class="tag-sale">Giảm {{number_format($newProduct->product_price*$newProduct->product_discount)}}đ</div>
                        @endif
                        <img src="img/product/{{$newProduct->product_image}}">

                      </div>
                      
                      <div class="product-name">{{$newProduct->product_name}}</div>
                      <div class="price">

                        @if($newProduct->product_discount != 0)
                          <div class="product-discount">{{number_format($newProduct->product_price)}}</div>
                        @endif

                        <div class="product-price">{{number_format($newProduct->product_price-($newProduct->product_discount*$newProduct->product_price))}}</div>
                      </div>
                    </a>
                  </div>
                  @endforeach

                </div>
              </div>
            </div>
@endsection