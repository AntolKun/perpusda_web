@extends('layouts.AdminTemplate')

@section('css')
<link href="{{ asset('skoteassets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ asset('skoteassets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('skoteassets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ asset('skoteassets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('skoteassets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('skoteassets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0">Data Kategori Buku</h4>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKategoriModal">
        <i class="bx bx-plus"></i> Tambah Kategori
      </button>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-12">
    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" style="border: 2px solid #3751CF;">
      <thead style="background-color: #3751CF; color: white;">
        <tr>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategori_buku as $kategori)
        <tr>
          <td>{{ $kategori->nama }}</td>
          <td>{{ $kategori->deskripsi }}</td>
          <td>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editKategoriModal{{ $kategori->id }}">Edit</button>
            <form action="{{ route('kategori-buku.destroy', $kategori->id) }}" method="POST" class="d-inline">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </td>
        </tr>

        <!-- Edit Modal -->
        <div class="modal fade" id="editKategoriModal{{ $kategori->id }}" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('kategori-buku.update', $kategori->id) }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="{{ $kategori->deskripsi }}">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Tambah Modal -->
<div class="modal fade" id="addKategoriModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kategori-buku.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@section('js')
<!-- Required datatable js -->
<script src="{{ asset('skoteassets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('skoteassets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('skoteassets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('skoteassets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('skoteassets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('skoteassets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('skoteassets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('skoteassets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('skoteassets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('skoteassets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('skoteassets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('skoteassets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('skoteassets/js/pages/datatables.init.js') }}"></script>
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

@stop


@endsection