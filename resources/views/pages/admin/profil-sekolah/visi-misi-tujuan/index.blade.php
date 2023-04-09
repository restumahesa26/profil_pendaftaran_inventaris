@extends('layouts.admin')

@section('title', 'Visi Misi Tujuan')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <button type="button" class="btn btn-primary btn-rounded mb-3" data-bs-toggle="modal" data-bs-target="#modal-visi-misi-tujuan">
            Tambah Data Visi, Misi, dan Tujuan
        </button>
        <div class="modal fade" id="modal-visi-misi-tujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Visi, Misi, dan Tujuan</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('visi-misi-tujuan.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="" hidden>--Pilih Jenis--</option>
                                    <option value="visi" @if(old('jenis') == 'visi') selected @endif>Visi</option>
                                    <option value="misi" @if(old('jenis') == 'misi') selected @endif>Misi</option>
                                    <option value="tujuan" @if(old('jenis') == 'tujuan') selected @endif>Tujuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea class='form-control' name='isi' id='isi' placeholder='Masukkan Isi' required>{{ old('isi') }}</textarea>
                                @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                <h4 class="card-title">Visi, Misi, dan Tujuan</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->jenis == 'visi')
                                        Visi
                                    @elseif ($item->jenis == 'misi')
                                        Misi
                                    @else
                                        Tujuan
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit{{ $item->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('visi-misi-tujuan.destroy', $item->id) }}" method="POST" class="d-inline">
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
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Visi, Misi, dan Tujuan</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('visi-misi-tujuan.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="jenis">Jenis</label>
                                                    <select name="jenis" id="jenis" class="form-control">
                                                        <option value="" hidden>--Pilih Jenis--</option>
                                                        <option value="visi" @if(old('jenis', $item->jenis) == 'visi') selected @endif>Visi</option>
                                                        <option value="misi" @if(old('jenis', $item->jenis) == 'misi') selected @endif>Misi</option>
                                                        <option value="tujuan" @if(old('jenis', $item->jenis) == 'tujuan') selected @endif>Tujuan</option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="isi">Isi</label>
                                                    <textarea class='form-control' name='isi' id='isi{{ $item->id }}' placeholder='Masukkan Isi' required>{!! old('isi', $item->isi) !!}</textarea>
                                                    @error('isi')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                                <td colspan="4">-- Data Kosong --</td>
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
    <style>
        .dataTables_wrapper .dataTable .btn, .dataTables_wrapper .dataTable .ajax-upload-dragdrop .ajax-file-upload, .ajax-upload-dragdrop .dataTables_wrapper .dataTable .ajax-file-upload, .dataTables_wrapper .dataTable .swal2-modal .swal2-buttonswrapper .swal2-styled, .swal2-modal .swal2-buttonswrapper .dataTables_wrapper .dataTable .swal2-styled {
            padding: 8px 20px;
            vertical-align: top;
        }
    </style>
@endpush

@push('addon-script')
    <script src="{{ url('sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
    @if ($errors->any())
    <script>
        $(document).ready(function () {
            $('#modal-visi-misi-tujuan').modal('show');
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

    <script>
        CKEDITOR.replace('isi', {
            height: 300,
        });

    </script>

    @foreach ($items as $item)
        <script>
            CKEDITOR.replace('isi{{ $item->id }}', {
            height: 300,
        });
        </script>
    @endforeach

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
