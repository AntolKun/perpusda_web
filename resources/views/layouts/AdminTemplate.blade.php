<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Admin Panel | Perpustakaan SMAN 8 Bandar Lampung</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta content="Aplikasi perpustakaan SMAN 8 Bandar Lampung" name="description" />
  <meta content="Najib Wiharjanto" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('images/perpusda-logo.png')}}">
  <!-- Bootstrap Css -->
  <link href="{{ asset('skoteassets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ asset('skoteassets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ asset('skoteassets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
  @yield('css')
</head>

<body data-sidebar="dark" data-layout-mode="light">
  @php
  $admin = \App\Models\Admin::where('user_id', auth()->user()->id)->first();
  $role = auth()->user()->role;
  @endphp
  <!-- Begin page -->
  <div id="layout-wrapper">
    <header id="page-topbar">
      <div class="navbar-header">
        <div class="d-flex">
          <!-- LOGO -->
          <div class="navbar-brand-box">
            <a href="/adminDashboard" class="logo logo-dark">
              <span class="logo-sm">
                <img src="{{ asset('images/perpusda-logo2.png') }}" alt="" height="22" class="mt-4" />
              </span>
              <span class="logo-lg">
                <img src="{{ asset('images/perpusda-logo2.png') }}" alt="" height="70" class="mt-2" />
              </span>
            </a>

            <a href="/adminDashboard" class="logo logo-light">
              <span class="logo-sm">
                <img src="{{ asset('images/perpusda-logo2.png') }}" alt="" height="22" class="mt-4" />
              </span>
              <span class="logo-lg">
                <img src="{{ asset('images/perpusda-logo2.png') }}" alt="" height="70" class="mt-2" />
              </span>
            </a>
          </div>

          <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
          </button>
        </div>

        <div class="d-flex">

          <div class="dropdown d-none d-lg-inline-block ms-1">
            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
              <i class="bx bx-fullscreen"></i>
            </button>
          </div>

          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle header-profile-user" src="{{ asset('admin_photos/' . $admin->foto) }}" alt="Header Avatar" />
              <span class="d-none d-xl-inline-block ms-1" key="t-henry">Admin {{ $admin->nama }}</span>
              <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
              <div class="dropdown-item text-danger">
                <form id="logout-form" action="{{ route('actionLogout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                  <span key="t-logout">Logout</span>
                </a>
              </div>
            </div>
          </div>

          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
              <i class="bx bx-cog bx-spin"></i>
            </button>
          </div>
        </div>
      </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">
      <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
          <div class="mb-2 mt-4 text-center d-flex flex-column justify-content-center align-items-center">
            <h5 class="text-white">Selamat Datang</h5>
            <h6 class="text-white">Admin {{ $admin->nama }}</h6>
          </div>
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>

            <li>
              <a href="/adminDashboard" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-file-manager">Dashboard</span>
              </a>
            </li>

            <li>
              <a href="/adminData" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-file-manager">Data Admin</span>
              </a>
            </li>

            <li>
              <a href="/adminKategori" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-file-manager">Data Kategori Buku</span>
              </a>
            </li>

            <li>
              <a href="/adminBuku" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-file-manager">Data Buku</span>
              </a>
            </li>

            <li>
              <a href="/adminPeminjaman" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-file-manager">Data Peminjaman Buku</span>
              </a>
            </li>

            <li>
              <a href="/adminPengembalian" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-file-manager">Pengembalian Buku</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">
          <!-- start page items -->
          @yield('content')
          <!-- end page items -->
        </div>
      </div>
    </div>
    <!-- end main content-->

    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <script>
              document.write(new Date().getFullYear());
            </script>
            © SMAN 8 Bandar Lampung
          </div>
          <div class="col-sm-6">
            <div class="text-sm-end d-none d-sm-block">
              Developed by Najib Wiharjanto
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
  <!-- END layout-wrapper -->

  <!-- Right Sidebar -->
  <div class="right-bar">
    <div data-simplebar class="h-100">
      <div class="rightbar-title d-flex align-items-center px-3 py-4">
        <h5 class="m-0 me-2">Settings</h5>

        <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
          <i class="mdi mdi-close noti-icon"></i>
        </a>
      </div>

      <!-- Settings -->
      <hr class="mt-0" />
      <h6 class="text-center mb-0">Choose Layouts</h6>

      <div class="p-4">
        <div class="mb-2">
          <img src="{{asset('skoteassets/images/layouts/layout-1.jpg')}}" class="img-thumbnail" alt="layout images" />
        </div>
        <div class="form-check form-switch mb-3">
          <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked />
          <label class="form-check-label" for="light-mode-switch">Light Mode</label>
        </div>
        <div class="mb-2">
          <img src="{{asset('skoteassets/images/layouts/layout-2.jpg')}}" class="img-thumbnail" alt="layout images" />
        </div>
        <div class="form-check form-switch mb-3">
          <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" />
          <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
        </div>
      </div>
    </div>
  </div>
  <!-- /Right-bar -->

  <!-- JAVASCRIPT -->
  <script src="{{ asset('skoteassets/libs/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('skoteassets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('skoteassets/libs/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('skoteassets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('skoteassets/libs/node-waves/waves.min.js') }}"></script>
  <script src="{{ asset('skoteassets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('skoteassets/js/app.js') }}"></script>
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
  @yield('js')
</body>

</html>