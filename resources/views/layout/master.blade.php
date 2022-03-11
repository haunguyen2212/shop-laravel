<!DOCTYPE html>
<html>
<head>
  <base href="{{asset('frontend')}}/">
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="css/master.css">
  @yield('style')
</head>
<body>
	<header>
    <div class="container">
      <div class="row">
        <div class="logo col-md-3 col-sm-4">
          <img src="img/logo.png">
        </div>
        <div class="col-md-6 col-sm-12 menu-search">
          <form id="search" action="{{ route('search') }}" method="get">
            @csrf
            <input type="text" name="keyword" id="keyword" placeholder="Tìm sản phẩm, thương hiệu mong muốn" value="{{ request('keyword') ? request('keyword') : '' }}">
            <input type="submit" value="Tìm kiếm">
          </form>
        </div>
        <div class="col-md-3 col-sm-6 user-shortcut">
          @if(Auth::check())
          <div class="dropdown">
            <button id="avatar" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/avatar/{{ Auth::user()->avatar }}" alt="avatar">
              <span>{{ Auth::user()->username }}</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="profile">
              <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user"></i>&ensp;Tài khoản</a></li>
              <li><a class="dropdown-item" href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart"></i>&ensp;Giỏ hàng</a></li>
              <li><a class="dropdown-item" href="{{ route('profile') }}#history"><i class="fas fa-history"></i>&ensp;Lịch sử mua hàng</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>&ensp;Đăng xuất</a></li>
            </ul>
          </div>
            
          @else
            <div id="user" onclick="window.location='{{ route('login') }}'" style="cursor: pointer"><i class="fas fa-user-circle"></i> ĐĂNG NHẬP</div>
            <div id="cart">
              <i class="fas fa-shopping-cart" onclick="window.location='{{ route('cart.show') }}'" style="cursor: pointer"></i>
            </div>
          @endif

          

        </div>   
      </div>
    </div> 
  </header>
  <section id="body">
    <div class="container">
      <div class="row">
        <!--SiderBar-->
        <div id="sidebar" class="col-md-3">
          <div id="menu">
            <ul>
              <li>DANH MỤC SẢN PHẨM</li>

              @foreach($categories as $category)
              <li><a href="{{ route('category', ['category_slug' => $category->product_category_slug ] )}}">{{$category->product_category_name}}</a></li>
              @endforeach

            </ul>
          </div>
          <div id="banner-left">
            <div class="banner-left-item">
              <img src="img/banner/banner-l-1.png">
            </div>
            <div class="banner-left-item">
              <img src="img/banner/banner-l-2.png">
            </div>
            <div class="banner-left-item">
              <img src="img/banner/banner-l-3.png">
            </div>
            <div class="banner-left-item">
              <img src="img/banner/banner-l-4.png">
            </div>
            <div class="banner-left-item">
              <img src="img/banner/banner-l-5.png">
            </div>
            <div class="banner-left-item">
              <img src="img/banner/banner-l-7.png">
            </div>
          </div>
        </div>
        <!--Endsiderbar-->
        <div class="col-md-9 col-xs-8">
          <!--Slider-->
          <div id="slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#slider" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#slider" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/banner/banner-1.png" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="img/banner/banner-2.png" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="img/banner/banner-3.png" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="img/banner/banner-4.png" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="img/banner/banner-5.png" class="d-block w-100" alt="">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!--EndSlider-->
          <!--Content-->
          <div id="content">
            
              @yield('content')
            
          </div>

        </div>
      </div>
    </div>
  </section>
  <footer class="text-center text-white">
    <div class="container p-4 pb-0">
      <section class="mb-4">
        <a class="btn btn-outline-light btn-floating m-1" href="{{route('home')}}" role="button">
          <i class="fab fa-facebook-f"></i>
        </a>

        <a class="btn btn-outline-light btn-floating m-1" href="{{route('home')}}" role="button">
          <i class="fab fa-twitter"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="{{route('home')}}" role="button">
          <i class="fab fa-google"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="{{route('home')}}" role="button">
          <i class="fab fa-instagram"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="{{route('home')}}" role="button">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="{{route('home')}}" role="button">
          <i class="fab fa-github"></i>
        </a>
      </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">© 2021 Copyright: <a class="text-white" href="{{route('home')}}">lionelstore@gmail.com</a></div>
  </footer>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  @yield('script')
</body>
</html>