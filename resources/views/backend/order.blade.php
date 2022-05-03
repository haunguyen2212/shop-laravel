@extends('layout.admin')

@section('title', 'Đơn hàng')

@section('style')
  <link rel="stylesheet" href="../frontend/css/toastr.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <form action="">
                @csrf
                <div class="card-header">
                  <h3 class="card-title">Danh sách đơn hàng</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                      <input type="text" name="search" class="form-control float-right" value="{{ old('search') }}">
  
                      <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th width="5%">STT</th>
                        <th width="10%">Mã đơn hàng</th>
                        <th width="15%">Tên khách hàng</th>
                        <th width="30%">Địa chỉ giao hàng</th>
                        <th width="10%">Tổng tiền</th>
                        <th width="20%">Trạng thái</th>
                        <th width="10%">Chi tiết</th>
                      </tr>
                    </thead>
                    <tbody id="order-table">
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_address }}</td>
                            <td>{{ number_format($order->total) }}</td>
                            <td>
                                @if ($order->payment_status == 1)
                                    <span class="badge badge-primary">Đã thanh toán</span>
                                @else
                                    <span class="badge badge-danger">Chưa thanh toán</span>
                                @endif

                                @if ($order->order_status == 2)
                                    <span class="badge badge-primary">Thành công</span>
                                @elseif ($order->order_status == 1)
                                    <span class="badge badge-success">Đã duyệt</span>
                                @elseif ($order->order_status == 0)
                                    <span class="badge badge-secondary">Chưa duyệt</span>
                                @else
                                    <span class="badge badge-danger">Đã hủy</span>
                                @endif
                                
                            </td>
                            <td>
                              <button type="button" class="show border border-transparent bg-transparent text-danger ml-2" 
                                      data-toggle="modal" 
                                      data-target="#orderDetailShow"
                                      data-id="{{ $order->order_id }}">
                                <i class="fas fa-circle-notch"></i>
                              </button>
                          </td>
                          </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                  <div id="pagination" class="pagination m-2">{{$orders->links()}}</div>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        @include('backend.orderdetail')
    </div>
@endsection

@section('script')
  <script type="text/javascript" src="../frontend/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script>
    $(document).ready(function(){
      $('#order').addClass('active');
  });

  var _token = $('meta[name="csrf-token"]').attr('content');

  $('.show').click(function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    $.ajax({
      type: 'get',
      url: '{{ route('order.detail') }}',
      data:{
        id:id,
        _token:_token,
      },
      success: function(respone){
        console.log(respone);
        loadOrderDetail(respone);
      }
    });
  });

  $('.btn-browsing').click(function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    //console.log(id);
    $.ajax({
      type: 'post',
      url: '{{ route('order.browsing') }}',
      data:{
        id:id,
        value: '1',
        _token:_token,
      },
      success: function(respone){
        window.location.reload();
      }
    })
  });

  $('.btn-cancel').click(function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    $.ajax({
      type: 'post',
      url: '{{ route('order.browsing') }}',
      data:{
        id:id,
        value: '-1',
        _token:_token,
      },
      success: function(respone){
        window.location.reload();
      }
    })
  });

  $('.btn-complete').click(function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    $.ajax({
      type: 'post',
      url: '{{ route('order.browsing') }}',
      data:{
        id:id,
        value: '2',
        _token:_token,
      },
      success: function(respone){
        window.location.reload();
      }
    })
  });

  
  </script>
@endsection