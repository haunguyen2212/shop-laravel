<!DOCTYPE html>
<html>
<head>
  <title>Đăng ký</title>
  <base href="{{asset('frontend')}}/">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="login-form">
   <div class="login">
    <h2 class="login-header">ĐĂNG KÝ</h2>
    <div class="grid">
      <form class="login-container" action="" method="post">

        @if ($errors->any())
						<div class="alert alert-info">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

          @if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

          @if (session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif

        @csrf
       <input type="text" name="username" placeholder="Nhập tên tài khoản" value="{{ old('username') }}" style="margin-top: 5px">
       <input type="text" name="name" placeholder="Nhập họ và tên" value="{{ old('name') }}">
       <input type="text" name="email" placeholder="Nhập email" value="{{ old('email') }}">
       <input type="password" name="password" placeholder="Nhập mật khẩu">
       <input type="submit" value="ĐĂNG KÝ">
     </form>
     <div class="bottom-text">
      <p>Đã có tài khoản?<a href="{{ route('login') }}">Đăng nhập</a></p>
    </div>
    </div>
   </div>
  </div>
</body>
</html>