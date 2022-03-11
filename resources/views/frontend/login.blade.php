<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
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
			<h2 class="login-header">ĐĂNG NHẬP</h2>
			<div class="grid">
				<form class="login-container" action="{{ route('login.post') }}" method="post">
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
						<div class="alert alert-danger">
							{{ session('status') }}
						</div>
					@endif

					@csrf
					<input type="text" placeholder="Tài khoản" name="usrname" value="{{ old('usrname') }}">
					<input type="password" placeholder="Mật khẩu" name="passwd">
					<input type="submit" name="login" value="ĐĂNG NHẬP">
				</form>
				<div class="second-section">
					<div class="bottom-header">
						<h3>HOẶC</h3>
					</div>
					<div class="social-links">
						<ul>
							<li> <a class="facebook" href="#" target="blank"><i class="fab fa-facebook-f"></i></a></li>
							<li> <a class="twitter" href="#" target="blank"><i class="fab fa-twitter"></i></a></li>
							<li> <a class="googleplus" href="#" target="blank"><i class="fab fa-google-plus-g"></i></a></li>
						</ul>
					</div>
				</div>
				
				<div class="bottom-text">
					<p>Chưa có tài khoản?<a href="{{ route('register') }}">Đăng ký</a></p>
				</div>
			</div>
		</div>
		
	</div>
  
  
</body>
</html>