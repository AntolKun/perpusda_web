<!DOCTYPE html>
<html lang="en">

<head>
	<!--  Title -->
	<title>Perpustakaan Daerah Bandar Lampung</title>
	<!--  Required Meta Tag -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="handheldfriendly" content="true" />
	<meta name="MobileOptimized" content="width" />
	<meta name="description" content="Web Perpustakaan Daerah Bandar Lampung" />
	<meta name="author" content="AntolKun" />
	<meta name="keywords" content="Perpustakaan Daerah Bandar Lampung" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!--  Favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('images/perpusda-logo.png') }}" />
	<!-- Core Css -->
	<link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
</head>

<body>
	<!-- Preloader -->
	<div class="preloader">
		<img src="{{ asset('images/perpusda-logo.png') }}" alt="loader" class="lds-ripple img-fluid" />
	</div>
	<!--  Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
		<div class="position-relative overflow-hidden radial-gradient min-vh-100">
			<div class="position-relative z-index-5">
				<div class="row">
					<div class="col-xl-6 col-xxl-6">
						<div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
							<div class="col-sm-8 col-md-6 col-xl-9">
								<!-- Logo Sekolah -->
								<div class="d-flex justify-content-center">
									<img src="{{ asset('images/perpusda-logo.png') }}" alt="Logo Sekolah" class="img-fluid mb-4" style="max-width: 150px;">
								</div>
								<!-- Teks Selamat Datang -->
								<h2 class="mb-3 fs-7 fw-bolder d-flex align-items-center text-center">Selamat datang di Perpustakaan Daerah Bandar Lampung</h2>
								<p class="text-center my-4">Silahkan Login</p>
								@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
								<form method="POST" action="{{ url('actionLogin') }}">
									{{ csrf_field() }}
									<div class="mb-3">
										<label for="email" class="form-label">Email</label>
										<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda..." required>
									</div>
									<div class="mb-4">
										<label for="password" class="form-label">Password</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password anda..." required>
									</div>
									<button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
									<div class="row d-flex">
										<div class="position-relative mt-3">
											<a class="text-primary fw-medium position-absolute top-50 start-0 translate-middle-y" href="#">Lupa Sandi?</a>
											<a class="text-primary fw-medium position-absolute top-50 end-0 translate-middle-y" href="/register">Buat Akun</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-6" style="background-color: #10439F;">
						<div class="d-none d-xl-flex align-items-center justify-content-center pt-5" style="height: calc(100vh - 80px);">
							<img src="{{ asset('images/perpusda-logo.png') }}" alt="" class="img-fluid" width="500">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<!--  Import Js Files -->
<script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!--  core files -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/app.init.js') }}"></script>
<script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>

<script src="{{ asset('dist/js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ($message = session()->get('success'))
<script type="text/javascript">
	Swal.fire({
		icon: 'success',
		title: 'Sukses!',
		text: '{{ $message }}',
	})
</script>
@endif

@if ($message = session()->get('error'))
<script type="text/javascript">
	Swal.fire({
		icon: 'error',
		title: 'Waduh!',
		text: '{{ $message }}',
	})
</script>
@endif
</body>

</html>