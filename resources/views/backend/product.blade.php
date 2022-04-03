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
                <button type="button" class="btn btn-sm text-success mr-2 add" data-url="{{ route('product.create', ['id' => $category->product_category_id]) }}" data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus"></i></button>
                <input type="text" id="search" name="search" class="form-control float-right" placeholder="Search"> 
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
                          <button type="button" class="btn btn-sm btn-warning edit" data-url="{{ route('product.edit', ['id' => $category->product_category_id, 'product' => $product->product_id]) }}" data-update="{{ route('product.update.info', ['id' => $product->product_id]) }}" data-detail="{{ route('detail.index', ['id' => $product->product_id]) }}" data-toggle="modal" data-target="#editProduct">Sửa</button>
                          <button class="btn btn-sm btn-danger delete" data-url="{{ route('product.destroy', ['id' => $category->product_category_id, 'product' => $product->product_id]) }}">Xóa</button>
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
  @include('backend.productshow')
  @include('backend.productadd')
  @include('backend.productedit')
  

@endsection

@section('script')
  
  <script type="text/javascript" src="../frontend/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script>
    $(document).ready(function(){
      $('#product').addClass('menu-open');
      $('#list-'+{{ request('id') }}).addClass('active');
      $('#nameAdd').keyup(function(){
        let title = $(this).val();
        let slug = getSlug(title);
        $('#slugAdd').val(slug);
      });
      $('#nameEdit').keyup(function(){
        let title = $(this).val();
        let slug = getSlug(title);
        $('#slugEdit').val(slug);
      });
    });

    var _token = $('meta[name="csrf-token"]').attr('content');

    // Hien thi san pham
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
          //console.log(respone);
          if(respone.status == 1){
            $('#show-product-id span').html(respone.data.product.product_id);
            $('#show-product-name span').html(respone.data.product.product_name);
            $('#show-product-category span').html(respone.data.category.product_category_name);
            $('#show-product-brand span').html(respone.data.brand.brand_name);
            $('#show-product-slug span').html(respone.data.product.product_slug);
            $('#show-product-price span').html(respone.data.product.product_price);
            $('#show-product-discount span').html(respone.data.product.product_discount*100+'%');
            $('#show-product-description span').html(respone.data.product.product_description);
            $('#show-product-img span').html('<img width="150px" src="../frontend/img/product/'+respone.data.product.product_image+'">');
            var strSpecification = '';
            $.each(respone.data.specification, function(prefix, val){
              strSpecification += '<div><strong>'+val.type_name+': </strong><span>'+val.specification+'</span></div>';
            });
            $('#show-product-specifcation span').html(strSpecification);
            var strColor = '';
            $.each(respone.data.color, function(prefix, val){
              strColor += '<div class="col-sm-4 border p-2">';
              strColor += '<div class="text-secondary font-weight-bold ml-3">'+val.color+':</div>';
              strColor += '<img width="150px" src="../frontend/img/product_detail/'+val.product_detail_image+'">';
              strColor += '<span><strong>Còn lại: </strong>'+val.product_detail_quantity+'</span>';
              strColor += '</div>';
            });
            $('#show-product-color span').html(strColor);
          }
          else{
            
          } 
        }
      });
    });

    //Them san pham
    $('.add').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      $.ajax({
        type: 'get',
        url: url,
        data: {
          _token:_token,
        },
        success: function(respone){
            if(respone.status == 1){
              //console.log(respone);
              var strBrand = '';
              $.each(respone.data, function(prefix, val){
                strBrand += '<option value="'+val.brand_id+'">'+val.brand_name+'</option>';
              });
              $('#brandAdd').html(strBrand);
              $('#frmAdd').attr('data-url',"{{ route('product.store', ['id' => $category->product_category_id]) }}");
            }
          }
        });
    });

    $('#frmAdd').submit(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      let description = CKEDITOR.instances['descriptionAdd'].getData();
      var formData = new FormData($('form#frmAdd')[0]);
      formData.delete('descriptionAdd');
      formData.append('descriptionAdd', description);
      $.ajax({
        type: 'post',
        url: url,
        data: formData,
        dataType: 'JSON',
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: function(){
          $('.error-text').html('');
        },
        success: function(respone){
          //console.log(respone);
            if(respone.status == 1){
              window.location.reload();
            }
            else{
              $.each(respone.error, function(prefix, val){
                $('span.error-'+prefix).html(val[0]);
              });
            }
          }
        });
    });

    // Chinh sua san pham
    $('.edit').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      let urlUpdate = $(this).attr('data-update');
      let urlDetail = $(this).attr('data-detail');
      $.ajax({
        type: 'get',
        url: url,
        data: {
          _token: _token,
        },
        success: function(respone){
          console.log(respone);
          if(respone.status == 1){
            let strBrand = '';
            $.each(respone.data.brand, function(prefix, val){
                strBrand += '<option value="'+val.brand_id+'">'+val.brand_name+'</option>';
              });
            $('#brandEdit').html(strBrand);
            $('#nameEdit').val(respone.data.product.product_name);
            $('#slugEdit').val(respone.data.product.product_slug);
            $('#brandEdit option[value='+respone.data.product.brand_id+']').attr('selected','selected');
            $('#priceEdit').val(respone.data.product.product_price);
            $('#discountEdit').val(respone.data.product.product_discount);
            CKEDITOR.instances['descriptionEdit'].setData(respone.data.product.product_description);
            $('#edit-upload').attr('src','../frontend/img/product/'+respone.data.product.product_image);
            if(respone.data.product.featured == "1"){
              $('#featuredEdit').attr('checked','checked');
            }
            else{
              $('#featuredEdit').removeAttr('checked');
            }
            $('#frmEdit').attr('data-url', urlUpdate);
            $('#show-detail').attr('href', urlDetail);
          }
        }
      });
    });

    $('#frmEdit').submit(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      let formEdit = new FormData($('form#frmEdit')[0]);
      let description = CKEDITOR.instances['descriptionEdit'].getData();
      formEdit.delete('descriptionEdit');
      formEdit.append('descriptionEdit', description);
      $.ajax({
        type: 'post',
        url: url,
        data: formEdit,
        dataType: 'JSON',
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: function(){
          $('.error-text').html('');
        },
        success: function(respone){
          //console.log(respone);
          if(respone.status == 1){
            window.location.reload();
          }
          else{
            $.each(respone.error, function(prefix, val){
                $('span.error-'+prefix).html(val[0]);
              });
            }
        }
      });
    });

    // Xoa san pham
    $('.delete').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      if(confirm('Bạn có chắc muốn xóa sản phẩm này không ?')){
        $.ajax({
        type: 'delete',
        url: url,
        data: {
          _token:_token,
        },
        success: function(respone){
            if(respone.status == 1){
              window.location.reload();
            }
          }
        });
      }     
    });

  </script>
  <script>
    CKEDITOR.replace('descriptionAdd');
    CKEDITOR.replace('descriptionEdit');
  </script>
@endsection