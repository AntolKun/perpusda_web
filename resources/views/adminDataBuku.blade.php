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
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Data Buku</h4>
      <div>
        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addBukuModal">
          <i class="bx bx-plus font-size-16 align-middle me-2"></i>Tambah Buku
        </button>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" style="border: 2px solid #3751CF;">
      <thead style="background-color: #3751CF; color: white;">
        <tr>
          <th>Gambar</th>
          <th>Judul Buku</th>
          <th>ISBN</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Stok</th>
          <th>Penulis</th>
          <th>Halaman</th>
          <th>Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($buku as $b)
        <tr>
          <td>
            @if ($b->gambar)
            <img src="{{ asset('storage/' . $b->gambar) }}" alt="Gambar Buku" width="100" height="100">
            @else
            <span>Tidak ada gambar</span>
            @endif
          </td>
          <td>{{ $b->judulbuku }}</td>
          <td>{{ $b->isbn }}</td>
          <td>{{ $b->penerbit }}</td>
          <td>{{ $b->tahun_terbit }}</td>
          <td>{{ $b->stok }}</td>
          <td>{{ $b->penulis }}</td>
          <td>{{ $b->halaman }}</td>
          <td>{{ $b->kategori->nama }}</td>
          <td>
            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editBukuModal{{ $b->id }}">Edit</button>
            <form action="{{ route('buku.destroy', $b->id) }}" method="POST" class="d-inline">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
            </form>
          </td>
        </tr>

        <!-- Edit Buku Modal -->
        <div class="modal fade" id="editBukuModal{{ $b->id }}" tabindex="-1" aria-labelledby="editBukuModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editBukuModalLabel">Edit Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('buku.update', $b->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judulbuku" class="form-control" value="{{ $b->judulbuku }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" value="{{ $b->isbn }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="{{ $b->penerbit }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" value="{{ $b->tahun_terbit }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <select name="stok" class="form-control" required>
                      <option value="Tersedia" {{ $b->stok == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                      <option value="Tidak Tersedia" {{ $b->stok == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="{{ $b->penulis }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Halaman</label>
                    <input type="number" name="halaman" class="form-control" value="{{ $b->halaman }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ $b->deskripsi }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-control" required>
                      @foreach ($kategori as $k)
                      <option value="{{ $k->id }}" {{ $b->kategori_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                    @if ($b->gambar)
                    <div class="mt-2">
                      <img src="{{ asset('storage/' . $b->gambar) }}" alt="Gambar Buku" width="100">
                    </div>
                    @endif
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

<!-- Add Buku Modal -->
<div class="modal fade" id="addBukuModal" tabindex="-1" aria-labelledby="addBukuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBukuModalLabel">Tambah Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input type="text" name="judulbuku" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Stok</label>
            <select name="stok" class="form-control" required>
              <option value="Tersedia">Tersedia</option>
              <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Halaman</label>
            <input type="number" name="halaman" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-control" required>
              @foreach ($kategori as $k)
              <option value="{{ $k->id }}">{{ $k->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control">
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