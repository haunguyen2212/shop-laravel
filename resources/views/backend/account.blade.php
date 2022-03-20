@extends('layout.admin')

@section('title', 'Tài khoản')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách tài khoản</h3>

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
                <th>UID</th>
                <th>Tài khoản</th>
                <th>Họ tên</th>
                <th>Vai trò</th>
                <th>Email</th>
                <th>Ngày tạo</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->uid }}</td>
                    <td>{{ $account->username }}</td>
                    <td>{{ $account->name }}</td>
                    <td>{{ ($account->role == 1) ? 'Admin' : 'Customer' }}</td>
                    <td>{{ $account->email }}</td>
                    <td>{{ date("d/m/Y H:i:s", strtotime($account->created_at))}}</td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('script')
  <script>
      $(document).ready(function(){
        $('#account').addClass('active');
    });
  </script>
@endsection