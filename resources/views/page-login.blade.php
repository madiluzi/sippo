<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Masuk|Sistem Peramalan Persediaan Produk</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/vendor/icon-sets.css">
	<link rel="stylesheet" href="/assets/css/main.min.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="/assets/css/login-font.css" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<form class="form-auth-small" method="POST" action="/login">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="username" class="control-label sr-only">Nama Pengguna</label>
									<input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna">
								</div>
								<div class="form-group">
									<label for="password" class="control-label sr-only">Kata Sandi</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
                            <h1 class="heading">Sistem Persediaan Produk</h1>
							<p>Koperasi Sekar</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
