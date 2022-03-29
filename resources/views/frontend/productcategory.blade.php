@extends('layout.master')

@section('title','Danh mục sản phẩm')

@section('style')
	<link rel="stylesheet" href="css/productcategory.css">
@endsection

@section('content')
	<div id="brand" class="row">

    @if(isset($brands) && $brands->count() > 0)
      @foreach($brands as $brand)
        <div class="col-md-2 col-sm-3 brand-item">
          <a href="{{ route('product_brand',['brand_slug' => $brand->brand_slug]) }}">
            <img src="img/logo/{{$brand->brand_image}}" >
          </a>
        </div>
      @endforeach
    @endif

  </div>

            <!--Product-->
            <div id="wrap-inner">
              <div class="product">

                @if(isset($categoryInfo))
                  <div class="product-caption">Danh mục {{$categoryInfo->product_category_name}}</div>
                @endif

                @if(isset($brandInfo))
                  <div class="product-caption">Thương hiệu {{$brandInfo->brand_name}}</div>
                @endif

                <form action="">
                  <div class="row" id="sorting">
                    <div class="col-md-3 col-sm-4">
                      <select id="price" name="price" class="form-select" onchange="this.form.submit();">
                        <option {{ request('price') == 'all' ? 'selected' : '' }} value="all" selected>Tất cả sản phẩm</option>
                        <option {{ request('price') == 'lv1' ? 'selected' : '' }} value="lv1">Dưới 5 triệu</option>
                        <option {{ request('price') == 'lv2' ? 'selected' : '' }} value="lv2">Từ 5 triệu đến 10 triệu</option>
                        <option {{ request('price') == 'lv3' ? 'selected' : '' }} value="lv3">Từ 10 triệu đến 20 triệu</option>
                        <option {{ request('price') == 'lv4' ? 'selected' : '' }} value="lv4">Trên 20 triệu</option>
                      </select>
                    </div>
                    <div class="col-md-2 col-sm-3">
                      <select id="sort_by" name="sort_by" class="form-select" onchange="this.form.submit();">
                        <option {{ request('sort_by') == 'latest' ? 'selected' : '' }} value="latest">Mới nhất</option>
                        <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">Cũ nhất</option>
                        <option {{ request('sort_by') == 'price-asc' ? 'selected' : '' }} value="price-asc">Giá tăng dần</option>
                        <option {{ request('sort_by') == 'price-desc' ? 'selected' : '' }} value="price-desc">Giá giảm dần</option>
                      </select>              
                    </div> 
                  </div>
                </form>
                  


                <div class="row product-list">

                @if(isset($products) && count($products) > 0)
                  @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 product-item"> 
                      <a href="{{ route('product.detail',['product_slug' => $product->product_slug]) }}">
                        <div class="product-img">
                          @if($product->product_discount != 0)
                            <div class="tag-sale">Giảm {{number_format($product->product_price*$product->product_discount)}}đ</div>
                          @endif
                          <img src="img/product/{{$product->product_image}}">
                        </div>
                        
                        <div class="product-name">{{$product->product_name}}</div>
                        <div class="price">

                          @if($product->product_discount != 0)
                            <div class="product-discount">{{number_format($product->product_price)}}</div>
                          @endif

                          <div class="product-price">{{number_format($product->product_price-($product->product_price*$product->product_discount))}}</div>
                        </div>
                      </a>
                    </div>
                  @endforeach

                @else
                  <div>Không tìm thấy sản phẩm</div>
                @endif

                </div>
              </div>

              <div id="pagination" class="pagination justify-content-center">{{$products->links()}}</div>

            </div>
@endsection