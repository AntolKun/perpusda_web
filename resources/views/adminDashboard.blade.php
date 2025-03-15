@extends('layouts.AdminTemplate')

@section('css')
<!-- Bootstrap Css -->
<link href="{{ asset('skoteassets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('skoteassets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('skoteassets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-sm-flex align-items-center justify-content-between">
			<h4 class="mb-sm-0 font-size-18">Dashboard</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="row">
			<div class="col-md-3">
				<div class="card mini-stats-wid">
					<div class="card-body">
						<div class="d-flex">
							<div class="flex-grow-1">
								<p class="text-muted fw-medium">Data Admin</p>
								<h4 class="mb-0">4</h4>
							</div>
							<div class="flex-shrink-0 align-self-center">
								<div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
									<span class="avatar-title">
										<i class="bx bx-copy-alt font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card mini-stats-wid">
					<div class="card-body">
						<div class="d-flex">
							<div class="flex-grow-1">
								<p class="text-muted fw-medium">Data Buku</p>
								<h4 class="mb-0">3</h4>
							</div>
							<div class="flex-shrink-0 align-self-center">
								<div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
									<span class="avatar-title rounded-circle bg-primary">
										<i class="bx bx-purchase-tag-alt font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card mini-stats-wid">
					<div class="card-body">
						<div class="d-flex">
							<div class="flex-grow-1">
								<p class="text-muted fw-medium">Peminjaman Buku</p>
								<h4 class="mb-0">2</h4>
							</div>
							<div class="flex-shrink-0 align-self-center">
								<div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
									<span class="avatar-title rounded-circle bg-primary">
										<i class="bx bx-purchase-tag-alt font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card mini-stats-wid">
					<div class="card-body">
						<div class="d-flex">
							<div class="flex-grow-1">
								<p class="text-muted fw-medium">Pengembalian Buku</p>
								<h4 class="mb-0">1</h4>
							</div>
							<div class="flex-shrink-0 align-self-center">
								<div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
									<span class="avatar-title rounded-circle bg-primary">
										<i class="bx bx-purchase-tag-alt font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
