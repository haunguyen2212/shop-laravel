@extends('layout.admin')

@section('title', 'Trang chủ')

@section('style')
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $data['product'] }}</h3>

          <p>Sản phẩm</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('product.index', ['id' => $data['first_category']]) }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Đơn hàng</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $data['account'] }}</h3>

          <p>Tài khoản người dùng</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('admin.account') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Bình luận</p>
        </div>
        <div class="icon">
          <i class="ion ion-chatboxes"></i>
        </div>
        <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-sm-8">
      <h5 class="text-danger font-weight-bold">Thống kê doanh thu</h5>
      <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
          <div id="firstchart" style="height: 350px"></div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <input type="text" class="form-control form-control-sm" id="datepickerfrom" placeholder="Từ ngày">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <input type="text" class="form-control form-control-sm" id="datepickerto" placeholder="Đến ngày">
          </div>
        </div>
        <div class="col-sm-2">
          <button id="btn-filter" class="btn btn-sm btn-primary" data-url="{{ route('admin.filter.order') }}">Thống kê</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card bg-transparent">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-text-width"></i>
            Thống kê tháng
          </h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 100px;">
              <select class="custom-select mr-sm-2" id="statistic-to-month">
              </select>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul>
            <li>Tổng doanh thu:</li>
            <li>Số sản phẩm đã bán:</li>
            <li>Số đơn hàng:</li>
            <li>Bán chạy:
              <ul>
                <li>Phasellus iaculis neque</li>
                <li>Purus sodales ultricies</li>
                <li>Vestibulum laoreet porttitor sem</li>
                <li>Ac tristique libero volutpat at</li>
              </ul>
            </li>
            <li>Số bình luận:</li>
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
      
    </div>
    <div class="col-sm-4">
      <h5 class="text-danger text-center font-weight-bold">Sản phẩm</h5>
      <div id="chart_donut" style="height: 250px"></div>
    </div>
  </div>
</div>

@endsection

@section('script')
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script>
    $(document).ready(function(){
        $('#home').addClass('active'); 
        
        let d = new Date();
        let month = d.getMonth();
        let strOptMonth = '';
        for(let i = 1; i <= month; i++){
          strOptMonth += '<option value="'+i+'">Tháng '+i+'</option>';
        }
        strOptMonth += '<option value="'+(month+1)+'" selected >Tháng '+(month+1)+'</option>'
        $('#statistic-to-month').html(strOptMonth);

        var chart = new Morris.Area({
              element: 'firstchart',
              lineColors: ['#528B8B', '#FC8710', '#FF6541', '#A4ADD3'],
              pointFillColors: ['#ffffff'],
              pointStrokeColors: ['#819C79'],
              fillOpacity: 0.3,
              parseTime: false,
              hideHover: 'auto',
              xkey: 'period',
              ykeys: ['order', 'sales','quantity'],
              
              labels: ['đơn hàng', 'doanh số', 'số lượng']
            });

        var donut = Morris.Donut({
              element: 'chart_donut',
              resize: true,
              colors: ['#17a2b8', '#28a745', '#ffc107', '#dc3545'],
              data: [
                { label: 'Africa', value: 5 }
              ]
          });

        loadChartDefault();
        categoryStatistic()

        
            
        $( function() {
          $("#datepickerfrom").datepicker({
            dateFormat:"yy-mm-dd",
            minDate: "-1Y",
            maxDate: "0D"
          });
          $("#datepickerto").datepicker({
            dateFormat:"yy-mm-dd",
            minDate: "-1Y",
            maxDate: "0D"
          });
        });

        var _token = $('meta[name="csrf-token"]').attr('content');

        $('#btn-filter').click(function(e){
          e.preventDefault();
          let url = $(this).attr('data-url');
          let from_date = $('#datepickerfrom').val();
          let to_date = $('#datepickerto').val();
          if(from_date < to_date){
            $.ajax({
              type: 'post',
              url: url,
              data: {
                from_date:from_date,
                to_date:to_date,
                _token:_token,
              },
              success: function(respone){
                if(respone.status == 1){
                  chart.setData(respone.data);
                }
              }
            })
          }
          else{
            alert("Ngày không hợp lệ");
          }
        });
        
        function loadChartDefault(){
          $.ajax({
              type: 'post',
              url: '{{ route('admin.filter.default') }}',
              data: {
                _token:_token,
              },
              success: function(respone){
                if(respone.status == 1){
                  chart.setData(respone.data);
                }
              }
            })
        }

        function categoryStatistic(){
          $.ajax({
            type: 'get',
            url: '{{ route('admin.category.statistic') }}',
            data: {
              _token:_token,
            },
            success: function(respone){
              if(respone.status == 1){
                donut.setData(respone.data);
              }
            }
          })
        }

        



    });

    
  </script>
@endsection