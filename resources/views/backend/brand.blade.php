@extends('layout.admin')

@section('title', 'Nhãn hiệu')

@section('style')
  <link rel="stylesheet" href="../frontend/css/toastr.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Nhãn hiệu</h3>
                <div class="d-flex flex-row-reverse">
                    <button id="btn-add" class="btn btn-sm btn-primary d-flex" data-url="{{ route('brand.create') }}"><i class="fas fa-plus"></i></button>
                </div>
                
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="category" class="table table-bordered">
                    <thead>
                    <tr>
                    <th width="10%">Mã</th>
                    <th width="18%">Tên nhãn hiệu</th>
                    <th width="17%">Hình ảnh</th>
                    <th width="15%">Loại</th>
                    <th width="25%">Slug</th>
                    <th width="10%" class="px-4">Sửa</th>
                    <th width="10%" class="px-4">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->brand_id }}</td>
                        <td>{{ $brand->brand_name }}</td>
                        <td><img width="100px" src="../frontend/img/logo/{{ $brand->brand_image }}" alt="{{ $brand->brand_name }}"></td>
                        <td>{{ $brand->product_category_name }}</td>
                        <td>{{ $brand->brand_slug }}</td>
                        <td class="px-4"><i data-url="{{ route('brand.edit', ['brand' => $brand->brand_id]) }}" data-update="{{ route('brand.update', ['brand' => $brand->brand_id]) }}" class="fas fa-edit text-warning edit" style="cursor: pointer"></i></td>
                        <td class="px-4"><i data-url="{{ route('brand.destroy', ['brand' => $brand->brand_id]) }}" class="fas fa-times text-danger delete" style="cursor: pointer"></i></td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
                <div id="pagination" class="pagination m-2">{{$brands->links()}}</div>
                <!-- /.card-body -->
            </div>
        </div>

        <div id="frmControl" class="col-sm-4">
        <div id="form-add" class="card card-success" style="display: none">
            <div class="card-header">
                <h3 class="card-title">Thêm danh mục</h3>
            </div>
            <form id="frm-add" data-url="{{ route('brand.store') }}" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="nameAdd">Tên nhãn hiệu</label>
                        <input type="text" class="form-control" name="nameAdd" id="nameAdd" value="">
                        <span class="text-danger error-text error-nameAdd"></span>
                    </div>
                    <div class="form-group">
                        <label for="catAdd">Loại</label>
                        <select id="catAdd" name="catAdd" class="custom-select mr-sm-2">
                            <option selected>Chưa chọn nhãn</option>
                          </select>
                        <span class="text-danger error-text error-catAdd"></span>
                    </div>
                    <div class="form-group">
                        <label for="slugAdd">Slug</label>
                        <input type="text" class="form-control" name="slugAdd" id="slugAdd" value="">
                        <span class="text-danger error-text error-slugAdd"></span>
                    </div>
                    <div class="form-group">
                        <label for="imgAdd">Hình ảnh:</label>
                        <input type="file" class="form-control-file" id="imgAdd" name="imgAdd" required onchange="chooseFile(this,'add-upload')">
                        <div class="mt-2">
                          <img id="add-upload" alt="img" width="200px" style="display: none">
                        </div>
                        <span class="text-danger error-text error-imgAdd"></span>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success mt-2">Thêm</button>
                </div>
            </form>
        </div>
    
        <div id="form-edit" class="card card-warning" style="display: none">
            <div class="card-header">
                <h3 class="card-title text-white">Chỉnh sửa danh mục</h3>
            </div>
            <form id="frm-edit" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nameEdit">Tên danh mục</label>
                        <input type="text" class="form-control" name="nameEdit" id="nameEdit" value=""> 
                        <span class="text-danger error-text error-nameEdit"></span>      
                    </div>
                    <div class="form-group">
                        <label for="catEdit">Loại</label>
                        <select id="catEdit" name="catEdit" class="custom-select mr-sm-2">
                            <option selected>Chưa chọn nhãn</option>
                          </select>
                        <span class="text-danger error-text error-catEdit"></span>
                    </div>
                    <div class="form-group">
                        <label for="slugEdit">Slug</label>
                        <input type="text" class="form-control" name="slugEdit" id="slugEdit" value="">
                        <span class="text-danger error-text error-slugEdit"></span>
                    </div>
                    <div class="form-group">
                        <label for="imgEdit">Hình ảnh:</label>
                        <input type="file" class="form-control-file" id="imgEdit" name="imgEdit" onchange="chooseFile(this,'edit-upload')">
                        <div class="mt-2">
                          <img id="edit-upload" alt="img" width="100px">
                        </div>
                        <span class="text-danger error-text error-imgEdit"></span>
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
      $('#list-brands').addClass('active');
    });

    var _token = $('meta[name="csrf-token"]').attr('content');

    // Them nhan hieu
    $('#nameAdd').keyup(function(){
      let title = $(this).val();
      let slug = getSlug(title);
      $('#slugAdd').val(slug);
    });

    $('#btn-add').click(function(e){
        e.preventDefault();
      $('#form-edit').hide();
      $('#form-add').show();
      let url = $(this).attr('data-url');
      $.ajax({
          type: 'get',
          url: url,
          data: {
              _token:_token,
          },
          success: function(respone){
              if(respone.status == 1){
                  console.log(respone);
                  var strCat = '';
                  $.each(respone.data, function(prefix, val){
                    strCat += '<option value="'+val.product_category_id+'">'+val.product_category_name+'</option>';
                  });
                $('#catAdd').html(strCat);
              }
          }
      })
    });

    $('#frm-add').submit(function(e){
        e.preventDefault();
        let url = $(this).attr('data-url');
        var formAdd = new FormData($('form#frm-add')[0]);
        $.ajax({
            type: 'post',
            url: url,
            data: formAdd,
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
        })
    });

    //Sua nhan hieu
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
      let urlUpdate = $(this).attr('data-update');
      $.ajax({
        type: 'get',
        url: url,
        success: function(respone){
          //console.log(respone);
          $('#nameEdit').val(respone.data.brand.brand_name);
          $('#slugEdit').val(respone.data.brand.brand_slug);
          $('#edit-upload').attr('src','../frontend/img/logo/'+respone.data.brand.brand_image);
          var strCat = '';
            $.each(respone.data.category, function(prefix, val){
                strCat += '<option value="'+val.product_category_id+'">'+val.product_category_name+'</option>';
            });
            $('#catEdit').html(strCat);
            $('#catEdit option[value='+respone.data.brand.product_category_id+']').attr('selected','selected');
            $('#frm-edit').attr('data-url',urlUpdate);
        }
      }    
      );
    });

    $('#frm-edit').submit(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      let formEdit = new FormData($('form#frm-edit')[0]);
      for(var pair of formEdit.entries()) {
        console.log(pair[0]+ ', '+ pair[1]); 
        }
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
          console.log(respone);
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

    //Xoa nhan hieu
    $('.delete').click(function(e){
      e.preventDefault();
      let url = $(this).attr('data-url');
      if(confirm('Bạn có chắc muốn xóa danh mục này không ?')){
        $.ajax({
          type: 'delete',
          url: url,
          data: {
              _token: _token
          },
          success: function(respone){
            window.location.reload();
          }
        });
      }
    });

    

    </script>
@endsection