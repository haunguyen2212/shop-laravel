@extends('layout.admin')

@section('title', 'Trang chủ')

@section('style')
  <link rel="stylesheet" href="../frontend/css/toastr.min.css">
@endsection

@section('content')

<div class="row">
    <div class="col-sm-8">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Danh mục sản phẩm</h3>
              <div class="d-flex flex-row-reverse">
                <button id="btn-add" class="btn btn-sm btn-primary d-flex"><i class="fas fa-plus"></i></button>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">Mã</th>
                  <th width="35%">Tên danh mục</th>
                  <th width="35%">Slug</th>
                  <th width="10%" class="px-4">Sửa</th>
                  <th width="10%" class="px-4">Xóa</th>
                </tr>
                </thead>
                <tbody>
                
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->product_category_id }}</td>
                    <td>{{ $category->product_category_name }}</td>
                    <td>{{ $category->product_category_slug }}</td>
                    <td class="px-4"><i data-url="{{ route('category.edit', ['category' => $category->product_category_id]) }}" class="fas fa-edit text-warning edit"></i></td>
                    <td class="px-4"><i data-url="{{ route('category.destroy', ['category' => $category->product_category_id]) }}" class="fas fa-times text-danger delete"></i></td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>

    <div id="frmControl" class="col-sm-4">
      <div id="form-add" class="card card-success" style="display: none">
        <div class="card-header">
          <h3 class="card-title">Thêm danh mục</h3>
        </div>
        <form id="frm-add" data-url="{{ route('category.store') }}">
          <div class="card-body">
            <div class="form-group">
              <label for="nameAdd">Tên danh mục</label>
              <input type="text" class="form-control" name="nameAdd" id="nameAdd" value="">
              <span class="text-danger error-text error-add-name"></span>
            </div>
            <div class="form-group">
              <label for="slugAdd">Slug</label>
              <input type="text" class="form-control" name="slugAdd" id="slugAdd" value="">
              <span class="text-danger error-text error-add-slug"></span>
            </div>
            <button type="submit" class="btn btn-sm btn-success mt-2">Thêm</button>
          </div>
        </form>
      </div>
  
      <div id="form-edit" class="card card-warning" style="display: none">
        <div class="card-header">
          <h3 class="card-title text-white">Chỉnh sửa danh mục</h3>
        </div>
        <form id="frm-edit">
          <div class="card-body">
            <div class="form-group">
              <label for="nameEdit">Tên danh mục</label>
              <input type="text" class="form-control" name="nameEdit" id="nameEdit" value=""> 
              <span class="text-danger error-text error-edit-name"></span>      
            </div>
            <div class="form-group">
              <label for="slugEdit">Slug</label>
              <input type="text" class="form-control" name="slugEdit" id="slugEdit" value="">
              <span class="text-danger error-text error-edit-slug"></span>
            </div>
            <button type="submit" class="btn btn-sm btn-warning mt-2 text-white">Cập nhật</button>
          </div>
        </form>
      </div>
  
    </div>

</div>

@endsection

@section('script')
  <script type="text/javascript" src="../frontend/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script>
    $(document).ready(function(){
      $('#category').addClass('menu-open');
      $('#list-cats').addClass('active');
    });

    var _token = $('meta[name="csrf-token"]').attr('content');

    // Them danh muc
    $('#btn-add').click(function(){
      $('#form-edit').hide();
      $('#form-add').show();
    });

    $('#nameAdd').keyup(function(){
      let title = $(this).val();
      let slug = getSlug(title);
      $('#slugAdd').val(slug);
    });

    $('#frm-add').submit(function(e){
      e.preventDefault();
      let name =  $('#nameAdd').val();
      let slug = $('#slugAdd').val();
      let url = $(this).attr('data-url');
      $.ajax({
        type: 'post',
        url: url,
        data: {
          name:name,
          slug:slug,
          _token:_token,
        },
        beforeSend: function(){
          $('.error-text').html('');
        },
        success: function(respone){
          //console.log(respone);
          if(respone.status == 0){
            $.each(respone.error, function(prefix, val){
              $('span.error-add-'+prefix).html(val[0]);
            });
          }
          else{
            window.location.reload();
          } 
        }
      });
    });

     // Cap nhat danh muc
     $('#nameEdit').keyup(function(){
      let title = $(this).val();
      let slug = getSlug(title);
      $('#slugEdit').val(slug);
    });

    $('.edit').click(function(e){
      e.preventDefault();
      $('#form-add').hide();
      $('#form-edit').show();
      let url = $(this).attr('data-url');
      $.ajax({
        type: 'get',
        url: url,
        success: function(respone){
          //console.log(respone);
          $('#nameEdit').val(respone.data.product_category_name);
          $('#slugEdit').val(respone.data.product_category_slug);
          $('#frm-edit').attr('data-url', '{{ asset('admin/category') }}/'+respone.data.product_category_id);
        }
      }    
      );
    });

    $('#frm-edit').submit(function(e){
      e.preventDefault();
      let url = $('#frm-edit').attr('data-url');
      var name = $('#nameEdit').val();
      var slug = $('#slugEdit').val();
      $.ajax({
        type: 'put',
        url: url,
        data: {
          name:name,
          slug:slug,
          _token:_token,
        },
        beforeSend: function(){
          $('.error-text').html('');
        },
        success: function(respone){
          if(respone.status == 0){
            $.each(respone.error, function(prefix, val){
              $('span.error-edit-'+prefix).html(val[0]);
            });
          }
          else{
            window.location.reload();
          } 
        }
      });
    });

    // Xoa danh muc
    $('.delete').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      if(confirm('Bạn có chắc muốn xóa danh mục này không ?')){
        $.ajax({
          type: 'delete',
          url: url,
          data: {_token: _token},
          success: function(respone){
            window.location.reload();
          }
        });
      }
    });
  </script>
@endsection