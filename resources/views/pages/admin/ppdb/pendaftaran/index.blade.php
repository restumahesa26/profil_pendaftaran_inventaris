@extends('layouts.admin')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pendaftaran</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Wali</th>
                                <th>Status Pendaftaran</th>
                                <th>Status Tes</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->wali_murid->nama }}</td>
                                <td>
                                    @if ($item->checkDataAnak($item->id) || $item->checkDataAyah($item->id) || $item->checkDataIbu($item->id) || $item->checkDataTambahan($item->id) || $item->checkBerkas($item->id))
                                        <span class="badge bg-primary">Data Yang Diisi Belum Lengkap</span>
                                    @elseif ($item->status == 'tunggu')
                                        <span class="badge bg-primary">Menunggu Konfirmasi</span>
                                    @elseif ($item->status == 'verifikasi')
                                        <span class="badge bg-success">Sudah Dikonfirmasi</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->tanggal_tes == NULL)
                                        -
                                    @elseif ($item->tanggal_tes != NULL && $item->status_tes == NULL)
                                    <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                        Lihat Jadwal Tes
                                    </button>
                                    @elseif ($item->status_tes != NULL)
                                    @if ($item->status_tes == 'lulus')
                                        <span class="badge bg-success">Lulus</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Lolos</span>
                                    @endif
                                    @endif
                                </td>
                                <td>
                                    @if (!$item->checkDataAnak($item->id) && !$item->checkDataAyah($item->id) && !$item->checkDataIbu($item->id) && !$item->checkDataTambahan($item->id) && !$item->checkBerkas($item->id))
                                    <a href="{{ route('admin-pendaftaran.show', $item->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                    @endif
                                    <form action="{{ route('admin-pendaftaran.delete', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jadwal Tes</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    Tanggal
                                                </div>
                                                <div class="col-8">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_tes)->translatedFormat('l, d F Y') }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Jam
                                                </div>
                                                <div class="col-8">
                                                    {{ \Carbon\Carbon::parse($item->waktu_tes)->translatedFormat('H:i') }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    Ruang
                                                </div>
                                                <div class="col-8">
                                                    {{ $item->ruang_tes }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
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
