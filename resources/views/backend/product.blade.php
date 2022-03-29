@extends('layout.admin')

@section('title','Sản phẩm')

@section('style')
  <link rel="stylesheet" href="../frontend/css/toastr.min.css">
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $category->product_category_name }}</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <thead>
              <tr>
                <th width="5%">ID</th>
                <th width="20%">Tên sản phẩm</th>
                <th width="12.5%">Hình ảnh</th>
                <th width="12.5%">Thương hiệu</th>
                <th width="15%">Slug</th>
                <th width="10%">Giá</th>
                <th width="10%">Giảm giá</th>
                <th width="15%">Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td><img width="90px" src="../frontend/img/product/{{ $product->product_image }}"></td>
                    <td>{{ $product->brand_name }}</td>
                    <td>{{ $product->product_slug }}</td>
                    <td>{{ number_format($product->product_price) }}</td>
                    <td>{{ $product->product_discount * 100 }}%</td>
                    <td>
                        <div>
                          <button type="button" class="btn btn-sm btn-info show" data-url="{{ route('product.show', ['id' => $category->product_category_id, 'product' => $product->product_id]) }}" data-toggle="modal" data-target="#showProduct">Xem</button>
                          <button class="btn btn-sm btn-warning">Sửa</button>
                          <button class="btn btn-sm btn-danger">Xóa</button>
                        </div>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
        <div id="pagination" class="pagination m-2">{{$products->links()}}</div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  @include('backend.addproduct')
  

@endsection

@section('script')
  
  <script type="text/javascript" src="../frontend/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script>
    $(document).ready(function(){
      $('#product').addClass('menu-open');
      $('#list-'+{{ request('id') }}).addClass('active');
    });

    var _token = $('meta[name="csrf-token"]').attr('content');

    $('.show').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      $.ajax({
        type: 'get',
        url: url,
        data: {
          _token:_token,
        },
        success: function(respone){
          console.log(respone);
          if(respone.status == 1){
            $('#show-product-id span').html(respone.data.product.product_id);
            $('#show-product-name span').html(respone.data.product.product_name);
            $('#show-product-category span').html(respone.data.category.product_category_name);
            $('#show-product-brand span').html(respone.data.brand.brand_name);
            $('#show-product-slug span').html(respone.data.product.product_slug);
            $('#show-product-price span').html(respone.data.product.product_price);
            $('#show-product-discount span').html(respone.data.product.product_discount*100+'%');
            $('#show-product-img span').html('<img width="200px" src="../frontend/img/product/'+respone.data.product.product_image+'">');
          }
          else{
            
          } 
        }
      });
    });
  </script>
@endsection