<!DOCTYPE html>
<html lang="en">

<head>
	<title>Perpustakaan SMAN 8 Bandar Lampung</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Web Perpustakaan SMAN 8 Bandar Lampung" />
	<meta name="author" content="Najib Wiharjanto" />
	<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logosma.png') }}" />
	<link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
</head>

<body>
	<!-- Preloader -->
	<div class="preloader">
		<img src="{{ asset('assets/images/logosma.png') }}" alt="loader" class="lds-ripple img-fluid" />
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
									<img src="{{ asset('assets/images/logosma.png') }}" alt="Logo Sekolah" class="img-fluid mb-4" style="max-width: 150px;">
								</div>
								<h2 class="mb-3 fs-7 fw-bolder d-flex align-items-center text-center">Silahkan Daftar Akun di Perpustakaan SMAN 8 Bandar Lampung</h2>
								<p class="text-center my-4">Isi data di bawah ini untuk mendaftar</p>
								@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
								<form action="{{ url('/post-register') }}" method="POST">
									{{ csrf_field() }}
									<div class="mb-3">
										<label for="nama" class="form-label">Nama</label>
										<input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama anda..." required>
									</div>
									<div class="mb-3">
										<label for="email" class="form-label">Email</label>
										<input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email anda..." required>
									</div>
									<div class="mb-3">
										<label for="nisn" class="form-label">NISN</label>
										<input type="number" name="nisn" class="form-control" id="nisn" placeholder="Masukkan NISN anda..." required>
									</div>
									<div class="mb-3">
										<label for="nomor_telepon" class="form-label">Nomor Telepon</label>
										<input type="number" name="nomor_telepon" class="form-control" id="nomor_telepon" placeholder="Masukkan Nomor Telepon anda..." required>
									</div>
									<div class="mb-3">
										<label for="kelas" class="form-label">Kelas</label>
										<input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan kelas anda..." required>
									</div>
									<div class="mb-3">
										<label for="password" class="form-label">Password</label>
										<input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password anda..." required>
									</div>
									<div class="mb-4">
										<label for="password_confirmation" class="form-label">Konfirmasi Password</label>
										<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi password anda..." required>
									</div>
									<button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Daftar</button>
									<div class="row d-flex">
										<div class="position-relative mt-3">
											<a class="text-primary fw-medium position-absolute top-50 start-0 translate-middle-y" href="#">Lupa Sandi?</a>
											<a class="text-primary fw-medium position-absolute top-50 end-0 translate-middle-y" href="/login">Login</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-6" style="background-color: #10439F;">
						<div class="d-none d-xl-flex align-items-center justify-content-center pt-5" style="height: calc(100vh - 80px);">
							<img src="{{ asset('assets/images/LOGIN.SVG') }}" alt="" class="img-fluid" width="500">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--  Import Js Files -->
	<script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
	<script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('dist/js/app.min.js') }}"></script>
	<script src="{{ asset('dist/js/app.init.js') }}"></script>
	<script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
	<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>

	<script src="{{ asset('dist/js/custom.js') }}"></script>
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