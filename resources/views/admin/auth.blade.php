<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/auth/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/auth/css/my-login.css') }}">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="{{ asset('backend/auth/img/logo.jpg') }}">
					</div>
					@yield('content')
					<div class="footer">
						Copyright &copy; Your Company 2017
					</div>
				</div>		       
			</div>
		</div>
	</section>

	<script src="{{ asset('backend/auth/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/auth/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('backend/auth/js/my-login.js') }}"></script>
</body>
</html>