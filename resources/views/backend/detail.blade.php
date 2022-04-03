@extends('layout.admin')

@section('title', 'Chỉnh sửa chi tiết')

@section('style')
  <link rel="stylesheet" href="../frontend/css/toastr.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-danger font-weight-bold">{{ $product->product_name }}</h3> 
            <div class="d-flex flex-row-reverse">
              <button type="button" id="add-color" class="btn btn-sm btn-white text-danger d-flex" data-url="{{ route('detail.color.store', ['product_id' => $product->product_id]) }}" data-toggle="modal" data-target="#addColor">
                <i class="fas fa-plus"></i>
              </button>
            </div>   
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="10%">STT</th>
                  <th width="20%">Màu</th>
                  <th width="30%">Hình ảnh</th>
                  <th width="20%">Số lượng</th>
                  <th width="20%">Tùy chỉnh</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($details as $key => $detail)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $detail->color }}</td>
                    <td><img width="90px" src="../frontend/img/product_detail/{{ $detail->product_detail_image }}"></td>
                    <td>{{ $detail->product_detail_quantity }}</td>
                    <td>
                        <div>
                          <button type="button" class="btn btn-sm btn-info edit-color" data-url="{{ route('detail.color.edit', ['id' => $detail->product_detail_id]) }}" data-update="{{ route('detail.color.update', ['id' => $detail->product_detail_id]) }}" data-toggle="modal" data-target="#editColor">Sửa</button>
                          <button type="button" class="btn btn-sm btn-danger delete-color" data-url="{{ route('detail.color.destroy', ['id' => $detail->product_detail_id]) }}">Xóa</button>
                        </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>  
        </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title text-danger font-weight-bold">Thông số</h3>    
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <thead>
              <tr>
                <th width="15%">STT</th>
                <th width="20%">Tên</th>
                <th width="40%">Mô tả</th>
                <th width="25%">Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($specifications as $key => $spec)
                    <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $spec->type_name }}</td>
                    <td>{{ $spec->specification }}</td>
                    <td>
                        <div>
                          <button type="button" class="btn btn-sm btn-info edit-spec" data-toggle="modal" >Sửa</button>
                          <button class="btn btn-sm btn-danger delete-spec">Xóa</button>
                        </div>
                    </td>
                  </tr>
                @endforeach      
            </tbody>
          </table>
        </div>  
      </div>
    </div>

  </div>
  @include('backend.detailedit')
  @include('backend.detailadd')
@endsection

@section('script')
  <script type="text/javascript" src="../frontend/js/toastr.min.js"></script>
  {!! Toastr::message() !!}

  <script>
      $(document).ready(function(){
      $('#product').addClass('menu-open');
      $('#list-'+{{ $product->product_category_id }}).addClass('active');
    });

    var _token = $('meta[name="csrf-token"]').attr('content');

    //Them mau sac
    $('#add-color').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      $('#frmAddColor').attr('data-url', url);
    });

    $('#frmAddColor').submit(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      let formAddColor = new FormData($('form#frmAddColor')[0]);
      $.ajax({
        type: 'post',
        url: url,
        data: formAddColor,
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

    //Chinh sua mau sac
    $('.edit-color').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      let urlUpdate = $(this).attr('data-update');
      $.ajax({
        type: 'get',
        url: url,
        data: {
          _token: _token,
        },
        success: function(respone){
          //console.log(respone);
          $('#nameColorEdit').val(respone.data.color);
          $('#qtyColorEdit').val(respone.data.product_detail_quantity);
          $('#edit-color-upload').attr('src', '../frontend/img/product_detail/'+respone.data.product_detail_image);
          $('#frmEditColor').attr('data-url', urlUpdate);
        }
      });
    });

    $('#frmEditColor').submit(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      let formEditColor = new FormData($('form#frmEditColor')[0]);
      $.ajax({
        type: 'post',
        url: url,
        data: formEditColor,
        dataType: 'JSON',
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: function(){
          $('.error-text').html('');
        },
        success: function(respone){
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

    //Xoa mau sac
    $('.delete-color').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      if(confirm('Bạn có chắc muốn xóa chi tiết này không ?')){
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
@endsection

