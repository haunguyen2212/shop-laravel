@extends('layout.admin')

@section('title', 'Trang chủ')

@section('content')

<div class="row">
    <div class="col-sm-8">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Danh mục sản phẩm</h3>
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
                    <td class="px-4"><a href=""><i class="fas fa-edit text-warning"></i></a></td>
                    <td class="px-4"><a href=""><i class="fas fa-times text-danger"></i></a></td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>

    <div class="col-sm-4">

      <button id="btn-add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>

      <div id="add-cat" class="card card-success" style="display: none">
        <div class="card-header">
          <h3 class="card-title">Thêm danh mục</h3>
        </div>
        <form action="{{ route('admin.category.add') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Tên danh mục</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
              @error('name')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}">
              @error('slug')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
              @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-success mt-2">Thêm</button>
          </div>
          <!-- /.card-body -->
        </form>
      </div>
    </div>
</div>

@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('#category').addClass('menu-open');
      $('#list-cats').addClass('active');
    });

    $('#btn-add').click(function(){
      $(this).hide();
      $('#add-cat').show();
    });

    $('#name').keyup(function(){
      var title = $(this).val();
      var slug = title.toLowerCase();
      slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
      slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
      slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
      slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
      slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
      slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
      slug = slug.replace(/đ/gi, 'd');
      //Xóa các ký tự đặt biệt
      slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
      //Đổi khoảng trắng thành ký tự gạch ngang
      slug = slug.replace(/ /gi, "-");
      //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
      //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
      slug = slug.replace(/\-\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-/gi, '-');
      slug = slug.replace(/\-\-/gi, '-');
      //Xóa các ký tự gạch ngang ở đầu và cuối
      slug = '@' + slug + '@';
      slug = slug.replace(/\@\-|\-\@|\@/gi, '');
      $('#slug').val(slug);
    })

  </script>
  @if ($errors->any())
      <script>
        $('#btn-add').hide();
        $('#add-cat').show();
      </script>
  @endif
@endsection