@extends('layouts.admin')

@section('title', 'Guru Staf')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <button type="button" class="btn btn-primary btn-rounded mb-3" data-bs-toggle="modal" data-bs-target="#modal-guru-staf">
            Tambah Data Guru dan Staf
        </button>
        <div class="modal fade" id="modal-guru-staf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru dan Staf</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('guru-staf.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bidang">Bidang</label>
                                        <input type="text" name="bidang" class="form-control @error('bidang') is-invalid @enderror" id="bidang" placeholder="Masukkan Bidang" value="{{ old('bidang') }}" required>
                                        @error('bidang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" accept="image/png, image/jpg, image/jpeg" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" placeholder="Masukkan Foto" value="{{ old('foto') }}" required>
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook" placeholder="Masukkan Facebook" value="{{ old('facebook') }}">
                                        @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="instagram" placeholder="Masukkan Instagram" value="{{ old('instagram') }}">
                                        @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendidikan_terakhir_tingkat">Tingkat Pendidikan Terakhir</label>
                                        <input type="text" name="pendidikan_terakhir_tingkat" class="form-control @error('pendidikan_terakhir_tingkat') is-invalid @enderror" id="pendidikan_terakhir_tingkat" placeholder="Masukkan Tingkat Pendidikan Terakhir" value="{{ old('pendidikan_terakhir_tingkat') }}" required>
                                        @error('pendidikan_terakhir_tingkat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendidikan_terakhir_jurusan">Jurusan Pendidikan Terakhir</label>
                                        <input type="text" name="pendidikan_terakhir_jurusan" class="form-control @error('pendidikan_terakhir_jurusan') is-invalid @enderror" id="pendidikan_terakhir_jurusan" placeholder="Masukkan Jurusan Pendidikan Terakhir" value="{{ old('pendidikan_terakhir_jurusan') }}" required>
                                        @error('pendidikan_terakhir_jurusan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendidikan_terakhir_tahun_lulus">Tahun Lulus Pendidikan Terakhir</label>
                                        <input type="number" min="1945" name="pendidikan_terakhir_tahun_lulus" class="form-control @error('pendidikan_terakhir_tahun_lulus') is-invalid @enderror" id="pendidikan_terakhir_tahun_lulus" placeholder="Masukkan Tahun Lulus Pendidikan Terakhir" value="{{ old('pendidikan_terakhir_tahun_lulus') }}" required>
                                        @error('pendidikan_terakhir_tahun_lulus')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Guru dan Staf</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Bidang</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->bidang }}</td>
                                <td>{{ $item->pendidikan_terakhir_tingkat }} {{ $item->pendidikan_terakhir_jurusan }}, Lulus Tahun {{ $item->pendidikan_terakhir_tahun_lulus }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit{{ $item->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('guru-staf.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru dan Staf</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('guru-staf.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" value="{{ old('nama', $item->nama) }}" required>
                                                            @error('nama')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="bidang">Bidang</label>
                                                            <input type="text" name="bidang" class="form-control @error('bidang') is-invalid @enderror" id="bidang" placeholder="Masukkan Bidang" value="{{ old('bidang', $item->bidang) }}" required>
                                                            @error('bidang')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="foto">Foto</label>
                                                            <input type="file" accept="image/png, image/jpg, image/jpeg" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" placeholder="Masukkan Foto" value="{{ old('foto') }}">
                                                            @error('foto')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="facebook">Facebook</label>
                                                            <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook" placeholder="Masukkan Facebook" value="{{ old('facebook', $item->facebook) }}">
                                                            @error('facebook')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="instagram">Instagram</label>
                                                            <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="instagram" placeholder="Masukkan Instagram" value="{{ old('instagram', $item->instagram) }}">
                                                            @error('instagram')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pendidikan_terakhir_tingkat">Tingkat Pendidikan Terakhir</label>
                                                            <input type="text" name="pendidikan_terakhir_tingkat" class="form-control @error('pendidikan_terakhir_tingkat') is-invalid @enderror" id="pendidikan_terakhir_tingkat" placeholder="Masukkan Tingkat Pendidikan Terakhir" value="{{ old('pendidikan_terakhir_tingkat', $item->pendidikan_terakhir_tingkat) }}" required>
                                                            @error('pendidikan_terakhir_tingkat')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pendidikan_terakhir_jurusan">Jurusan Pendidikan Terakhir</label>
                                                            <input type="text" name="pendidikan_terakhir_jurusan" class="form-control @error('pendidikan_terakhir_jurusan') is-invalid @enderror" id="pendidikan_terakhir_jurusan" placeholder="Masukkan Jurusan Pendidikan Terakhir" value="{{ old('pendidikan_terakhir_jurusan', $item->pendidikan_terakhir_jurusan) }}" required>
                                                            @error('pendidikan_terakhir_jurusan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pendidikan_terakhir_tahun_lulus">Tahun Lulus Pendidikan Terakhir</label>
                                                            <input type="number" min="1945" name="pendidikan_terakhir_tahun_lulus" class="form-control @error('pendidikan_terakhir_tahun_lulus') is-invalid @enderror" id="pendidikan_terakhir_tahun_lulus" placeholder="Masukkan Tahun Lulus Pendidikan Terakhir" value="{{ old('pendidikan_terakhir_tahun_lulus', $item->pendidikan_terakhir_tahun_lulus) }}" required>
                                                            @error('pendidikan_terakhir_tahun_lulus')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr class="text-center">
                                <td colspan="5">-- Data Kosong --</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
    @if ($items->count() > 0)
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_wrapper .dataTable .btn, .dataTables_wrapper .dataTable .ajax-upload-dragdrop .ajax-file-upload, .ajax-upload-dragdrop .dataTables_wrapper .dataTable .ajax-file-upload, .dataTables_wrapper .dataTable .swal2-modal .swal2-buttonswrapper .swal2-styled, .swal2-modal .swal2-buttonswrapper .dataTables_wrapper .dataTable .swal2-styled {
            padding: 8px 13px;
            vertical-align: top;
        }
    </style>
    @endif
@endpush

@push('addon-script')
    <script src="{{ url('sweetalert2.all.min.js') }}"></script>
    @if ($items->count() > 0)
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" defer></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "orderable" : false,
            });
        });
    </script>
    @endif
    @if ($errors->any())
    <script>
        $(document).ready(function () {
            $('#modal-guru-staf').modal('show');
        });
    </script>
    @endif
    @if(session()->has('error'))
    <script>
        $(document).ready(function () {
            $('#modal-edit' + {{ session()->get("error") }}).modal('show');
        });
    </script>
    @endif
    {{-- @if(session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session()->get("success") }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif --}}

    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Hapus Data?',
            text: "Data Akan Terhapus Permanen",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>
@endpush
