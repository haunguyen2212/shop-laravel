@extends('layout.admin')

@section('title', 'Trang chủ')

@section('content')

<div class="row">
    <div class="col-sm-7">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh mục sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">Mã</th>
                  <th width="30%">Tên danh mục</th>
                  <th width="30%">Slug</th>
                  <th width="15%">Sửa</th>
                  <th width="15%">Xóa</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Misc</td>
                  <td>PSP browser</td>
                  <td>PSP</td>
                  <td>-</td>
                  <td>C</td>
                </tr>
                <tr>
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td>U</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>

@endsection

@section('script')

@endsection