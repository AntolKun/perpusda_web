<!DOCTYPE html>
<html lang="en">

<head>
  <!--  Title -->
  <title>Perpustakaan SMA Negeri 8 Bandar Lampung</title>
  <!--  Required Meta Tag -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="handheldfriendly" content="true" />
  <meta name="MobileOptimized" content="width" />
  <meta name="description" content="Web Perpustakaan Untuk SMAN 8 Bandar Lampung" />
  <meta name="author" content="Najib Wiharjanto" />
  <meta name="keywords" content="Web Perpustakaan Untuk SMAN 8 Bandar Lampung" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--  Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logosma.png') }}" />
  <link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
  <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
  <style>
    @media screen and (max-width: 1024px) {
      .show-on-small {
        display: block !important;
      }
    }
  </style>
  @yield('css')
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{ asset('assets/images/logosma.png') }}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{ asset('assets/images/logosma.png') }}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex flex-column align-items-center justify-content-center">
          <a href="index.html" class="text-nowrap logo-img text-center">
            <img src="{{ asset('assets/images/logosma.png') }}" class="dark-logo mb-2 mt-4" width="150" alt="Logo" />
            <img src="{{ asset('assets/images/logosma.png') }}" class="light-logo mb-2 mt-4" width="150" alt="Logo" />
          </a>
          <h5 class="text-center mt-2 mb-0 text-bold">Perpustakaan</h5>
          <h5 class="text-center mt-2 mb-0 text-bold">SMAN 8 Bandar Lampung</h5>
          <!-- <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer mt-3" id="sidebarCollapse">
						<i class="ti ti-x fs-8 text-muted"></i>
					</div> -->
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <!-- ============================= -->
            <!-- Home -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <!-- =================== -->
            <!-- Dashboard -->
            <!-- =================== -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Beranda</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/buku-dipinjam" aria-expanded="false">
                <span>
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Peminjaman</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/buku-dikembalikan" aria-expanded="false">
                <span>
                  <i class="ti ti-archive"></i>
                </span>
                <span class="hide-menu">Pengembalian</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/lomba" aria-expanded="false">
                <span>
                  <i class="ti ti-medal"></i>
                </span>
                <span class="hide-menu">Lomba Literasi</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container d-flex justify-content-between align-items-center">
            <!-- Sidebar Toggler (Kiri) -->
            <a class="nav-link sidebartoggler nav-icon-hover me-auto show-on-small" id="headerCollapse" href="javascript:void(0)" style="display: none;">
              <i class="ti ti-menu-2"></i>
            </a>

            <!-- Logo (Tengah) -->
            <div class="d-block d-lg-none mx-auto text-center">
              <img src="{{ asset('assets/images/logosma.png') }}" class="dark-logo" width="60" alt="Logo" />
              <img src="{{ asset('assets/images/logosma.png') }}" class="light-logo" width="60" alt="Logo" />
            </div>

            <!-- Profile (Kanan) -->
            <div class="dropdown ms-auto">
              @php
              $user = auth()->user();
              $siswa = $user->siswa;
              @endphp
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="{{ $siswa && $siswa->foto ? asset('siswa_photos/' . $siswa->foto) : 'https://i.redd.it/cudrte4m27n71.png' }}" width="40" alt="Header Avatar" />
                <span class="d-none d-xl-inline-block ms-1">{{ $siswa ? $siswa->nama : 'User' }}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSiswaModal">
                  <i class="bx bx-edit font-size-16 align-middle me-1"></i>
                  <span>Edit Profile</span>
                </a>
                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                  <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('actionLogout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          </div>
        </nav>
      </header>
      <!--  Header End -->

      <!-- Edit Profile Modal -->
      <div class="modal fade" id="editSiswaModal" tabindex="-1" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content" style="background-color: #10439F;">
            <div class="modal-header border-0 text-white">
              <h5 class="modal-title text-white" id="editSiswaModalLabel">Edit Profile</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container p-4 rounded" style="background-color: #10439F;">
                <div class="row">
                  <!-- Thumbnail -->
                  <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <!-- Foto -->
                      <div class="col-md-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('siswa_photos/' . $siswa->foto) }}" alt="Current Photo" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                        <input type="file" class="form-control" id="foto" name="foto">
                      </div>
                      <!-- Form Input -->
                      <div class="col-md-8">
                        <!-- Nama -->
                        <div class="mb-3">
                          <label for="nama" class="form-label text-white">Nama</label>
                          <input type="text" class="form-control bg-white" id="nama" name="nama" value="{{ $siswa->nama }}" required>
                        </div>
                        <!-- NISN -->
                        <div class="mb-3">
                          <label for="nisn" class="form-label text-white">NISN</label>
                          <input type="text" class="form-control bg-white" id="nisn" name="nisn" value="{{ $siswa->nisn }}" required>
                        </div>
                        <!-- Kelas -->
                        <div class="mb-3">
                          <label for="kelas" class="form-label text-white">Kelas</label>
                          <input type="text" class="form-control bg-white" id="kelas" name="kelas" value="{{ $siswa->kelas }}" required>
                        </div>
                        <!-- Nomor Telepon -->
                        <div class="mb-3">
                          <label for="nomor_telepon" class="form-label text-white">Nomor Telepon</label>
                          <input type="text" class="form-control bg-white" id="nomor_telepon" name="nomor_telepon" value="{{ $siswa->nomor_telepon }}" required>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                          <label for="email" class="form-label text-white">Email</label>
                          <input type="email" class="form-control bg-white" id="email" name="email" value="{{ $siswa->user->email }}" required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                          <label for="password" class="form-label text-white">Password</label>
                          <input type="password" class="form-control bg-white" id="password" name="password" placeholder="Biarkan Kosong Jika Tidak Diganti">
                        </div>
                        <!-- Confirm Password -->
                        <div class="mb-3">
                          <label for="password_confirmation" class="form-label text-white">Confirm Password</label>
                          <input type="password" class="form-control bg-white" id="password_confirmation" name="password_confirmation" placeholder="Biarkan Kosong Jika Tidak Diganti">
                        </div>
                      </div>
                    </div>
                    <div class="text-end mt-4">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




      <!--  Main Content Start -->
      <div class="container-fluid">
        @yield('content')
      </div>
      <!--  Main Content Start -->

    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
  </div>

  <!--  Customizer -->
  <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
  </button>
  <div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-simplebar="">
    <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
      <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
      <div class="theme-option pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Opsi Tema</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" onclick="toggleTheme('{{ asset('dist/css/style.min.css') }}')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
            <i class="ti ti-brightness-up fs-7 text-primary"></i>
            <span class="text-dark">Light</span>
          </a>
          <a href="javascript:void(0)" onclick="toggleTheme('{{ asset('dist/css/style-dark.min.css') }}')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
            <i class="ti ti-moon fs-7 "></i>
            <span class="text-dark">Dark</span>
          </a>
        </div>
      </div>
      <div class="theme-colors pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Warna Tema</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme " onclick="toggleTheme('{{ asset('dist/css/style.min.css') }}')" data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME"><i class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary " onclick="toggleTheme('{{ asset('dist/css/style-aqua.min.css') }}')" data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary" onclick="toggleTheme('{{ asset('dist/css/style-purple.min.css') }}')" data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary" onclick="toggleTheme('{{ asset('dist/css/style-green.min.css') }}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary" onclick="toggleTheme('{{ asset('dist/css/style-cyan.min.css') }}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary" onclick="toggleTheme('{{ asset('dist/css/style-orange.min.css') }}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--  Customizer -->
  <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
  <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dist/js/app.min.js') }}"></script>
  <script src="{{ asset('dist/js/app.init.js')}}"></script>
  <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
  <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js') }}"></script>
  <script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('dist/js/dashboard.js') }}"></script>
  <script src="{{ asset('dist/js/dashboard3.js') }}"></script>
  <script src="{{ asset('dist/libs/fullcalendar/index.global.min.js') }}"></script>
  <script src="{{ asset('dist/js/apps/calendar-init.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('js')

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