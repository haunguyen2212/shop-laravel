@extends('layout.master')

@section('title','Chi tiết sản phẩm')

@section('style')
	<link rel="stylesheet" href="css/productdetail.css">
@endsection

@section('content')
	<div id="wrap-inner" class="row">

              <div id="breadcrumb" class="col-md-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category', ['category_slug' => $productCategory->product_category_slug]) }}">{{ $productCategory->product_category_name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product_brand', ['brand_slug' => $productBrand->brand_slug]) }}">{{ $productBrand->brand_name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
                  </ol>
                </nav>
              </div>

              <div class="col-md-7 col-sm-6">
                <!--Product Image-->
                <div class="product-caption">{{$product->product_name}}</div>
                <div class="product-image">
                  @foreach($productDetails as $key => $productDetail)
                  <div class="mySlides">
                    <div class="numbertext">{{$key+1}} / {{$productDetails->count()}}</div>
                    <img src="img/product_detail/{{$productDetail->product_detail_image}}" style="width:100%">
                  </div>
                  @endforeach
                  <a class="prev" onclick="plusSlides(-1)">❮</a>
                  <a class="next" onclick="plusSlides(1)">❯</a>

                  <div class="caption-container">
                    <p id="caption"></p>
                  </div>

                  <div class="row">

                    @foreach($productDetails as $key => $productDetail)
                    <div class="column">
                      <img class="demo cursor" src="img/product_detail/{{$productDetail->product_detail_image}}" style="width:100%" onclick="currentSlide( {{$key+1}} )" alt="{{$productDetail->color}}">
                    </div>
                    @endforeach
                    
                  </div>
                </div>

                <!--Description-->
                <div class="product-caption">MÔ TẢ SẢN PHẨM</div>
                <div class="product-description">
                  <div>{!! $product->product_description !!}</div>
                  <div class="descript-caption">Giá: <span class="descript-price">{{number_format($product->product_price-($product->product_price*$product->product_discount))}}</span>

                    @if($product->product_discount != 0)
                    <span class="descript-discount">{{number_format($product->product_price)}}</span> <span class="discount-percent">-{{$product->product_discount*100}}%</span>
                    @endif

                  </div>
                  <div class="descript-caption">Tình trạng: 
                    
                      
                      @if ($productQuantity != 0 )
                        <span class="descript-state">Còn hàng</span>
                      @else
                        <span class="descript-state">Tạm hết hàng</span>
                      @endif
                      
                  </div>
                </div>

                <!--Comment-->
                <div class="product-caption">BÌNH LUẬN ({{ $comments->count() }})</div>
                  <div class="product-comment">

                    @if (Auth::check())
                      <div class="form-floating">             
                        @csrf
                        <textarea class="form-control" id="comment-content" style="height: 100px; outline: none"></textarea>
                        <label for="form-comment">Bình luận về sản phẩm</label>
                        <button class="btn btn-sm btn-danger float-end mt-2" onclick="sendComment({{ $product->product_id }});">Gửi bình luận</button>        
                      </div>
                      <hr>
                    @endif
                    
                    <div id="ajax-comment"></div>

                    @if (isset($comments) && $comments->count() > 0)
                      <div id="list-comment">

                        @foreach ($comments as $comment)
                          <div class="comment-ask">
                            <div class="row-user">
                              <img src="img/avatar/{{ $comment->avatar }}" alt="Avatar" class="avatar">
                              <span>{{ $comment->username }}</span>
                            </div>
                            <div class="comment-content">{{ $comment->messages }}</div>
                            <div class="action-user">
                              <a href="">Trả lời</a>
                              <span> - </span>
                              <span>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                            </div>
                          </div>
                        @endforeach
                          
                      </div>
                      
                    @endif
                    
                </div>
              </div>

              <div class="col-md-5 col-sm-6">
                  <div class="product-detail">
                    <div class="product-caption">Chi tiết sản phẩm</div>
                    <table class="table table-striped">
                      <tbody>
                        @foreach($productSpecifies as $productSpecifi)
                        <tr>
                          <td width="35%">{{$productSpecifi->type_name}}:</td>
                          <td width="65%">{{$productSpecifi->specification}}</td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="row payment">
                    <div class="col-md-12 col-sm-12 purchase">
                      @if ($productQuantity > 0)
                        <button type="button" data-bs-toggle="modal" data-bs-target="#purchaseModal">MUA NGAY</button>
                        <!-- Modal -->
                        <div class="modal fade" id="purchaseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form action="" method="get">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="purchaseModalLabel">{{ $product->product_name }}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="descript-caption">Chọn màu:</div>
                                  <div class="row">

                                    @foreach ($productDetails as $productDetail)
                                    <div class="choose-item col-3">
                                      <img src="img/product_detail/{{ $productDetail->product_detail_image }}">
                                      <input type="radio" name="color" class="form-check-input" {{ $productDetail->product_detail_quantity == 0 ? 'disabled' : '' }} value="{{ $productDetail->product_detail_id }}">
                                      <div class="color">{{ $productDetail->color }}</div>
                                    </div>
                                    @endforeach
                                  
                                  </div>
                                  <div class="descript-caption">Giá: <span class="descript-price">{{ number_format($product->product_price-($product->product_price*$product->product_discount)) }}</span> 
                                    
                                    @if ($product->product_discount != 0)
                                      <span class="descript-discount">{{ number_format($product->product_price) }}</span>
                                    @endif
                                    
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-sm btn-danger">Thêm vào giỏ hàng</button>
                                </div>
                              </form>
                            </div>
                          
                          </div>
                        </div>
                      @else
                        <button type="button">TẠM HẾT HÀNG</button>
                      @endif
                      

                    </div>
                    <div class="col-md-12 col-sm-12 installment">
                      <div><button>MUA TRẢ GÓP 0%<br>Duyệt trong 5 phút</button></div>
                      <div><button>TRẢ GÓP QUA THẺ<br>Visa, Mastercard, JCB</button></div>
                    </div>
                  </div>
              </div>
            </div>
@endsection

@section('script')
	<script type="text/javascript" src="js/productdetail.js"></script>
  <script>
    function sendComment(id){
      let content = $('#comment-content').val();
      $.get(
        '{{route('comment.send') }}',
        {id:id,comment:content},
        function(data){
          $('#ajax-comment').prepend(data);
          $('#comment-content').val(' ');
        }
        );
    }
  </script>
@endsection