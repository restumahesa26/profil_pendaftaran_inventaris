@extends('layouts.admin')

@section('title', 'Pembayaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pembayaran</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Wali</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->wali_murid->nama }}</td>
                                <td>
                                    @if ($item->checkPembayaran($item->id))
                                        <span class="badge bg-primary">Belum Bayar</span>
                                    @elseif ($item->pembayaran->status == 'tolak')
                                        <span class="badge bg-danger">Pembayaran Ditolak</span>
                                    @elseif ($item->pembayaran->status == 'tunggu')
                                        <span class="badge bg-primary">Menunggu Verifikasi</span>
                                    @elseif ($item->pembayaran->status == 'terima')
                                        <span class="badge bg-success">Pembayaran Diterima</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!$item->checkPembayaran($item->id))
                                    <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                        Lihat Bukti Pembayaran
                                    </button>
                                    @endif
                                    <form action="{{ route('admin-pendaftaran.delete', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                    </form>
                                    <a target="_blank" href="https://wa.me/{{ $item->wali_murid->no_wa }}" class="btn btn-sm btn-success">Chat WA</a>
                                </td>
                            </tr>
                            @if (!$item->checkPembayaran($item->id))
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-5">Bukti Pembayaran</div>
                                                <div class="col-12 mt-2">
                                                    @if ($item->pembayaran->bukti_pembayaran == NULL)
                                                        <p class="text-danger">Bukti Pembayaran Belum Dimasukkan Kembali</p>
                                                    @else
                                                        <img src="{{ url('images/bukti-pembayaran/' . $item->pembayaran->bukti_pembayaran) }}" alt="" srcset="" style="width: 100%">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <a href="{{ route('admin-pembayaran.tolak', $item->pembayaran->id) }}" class="btn btn-danger btn-tolak">Tolak Pembayaran</a>
                                            <a href="{{ route('admin-pembayaran.verifikasi', $item->pembayaran->id) }}" class="btn btn-primary btn-verifikasi">Verifikasi Pembayaran</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
        $('.btn-verifikasi').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = $(this).attr('href');
            Swal.fire({
                title: 'Verifikasi Pembayaran?',
                text: "Pembayaran Akan Diverifikasi",
                icon: 'info',
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Verifikasi',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = form;
                } else {
                    //
                }
            });
        });
        $('.btn-tolak').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = $(this).attr('href');
            Swal.fire({
                title: 'Tolak Pendaftaran?',
                text: "Pendaftaran Akan Ditolak",
                icon: 'info',
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Tolak',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = form;
                } else {
                    //
                }
            });
        });
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
