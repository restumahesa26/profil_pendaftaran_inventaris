@extends('layouts.admin')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary btn-rounded mb-3">Tambah Data Pendaftaran</a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pendaftaran</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Wali Murid</th>
                                <th>Periode</th>
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
                                <td>{{ $item->periode->periode }}</td>
                                <td>
                                    @if ($item->checkDataAnak($item->id) || $item->checkDataAyah($item->id) || $item->checkDataIbu($item->id) || $item->checkDataTambahan($item->id) || $item->checkBerkas($item->id))
                                        <span class="badge bg-info">Harap Lengkapi Data Terlebih Dahulu</span>
                                    @else
                                        @if ($item->status == 'tunggu')
                                            <span class="badge bg-primary">Menunggu Konfirmasi</span>
                                        @elseif ($item->status == 'verifikasi')
                                            <span class="badge bg-success">Sudah Dikonfirmasi</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
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
                                    <a href="{{ route('pendaftaran.data-anak', $item->id) }}" class="btn btn-sm btn-primary">
                                        @if (!$item->checkDataAnak($item->id) || !$item->checkDataAyah($item->id) || !$item->checkDataIbu($item->id) || !$item->checkDataTambahan($item->id))
                                            Lihat Data
                                        @else
                                            Lengkapi Data
                                        @endif
                                    </a>
                                    <a target="_blank" href="https://wa.me/+62895616130544" class="btn btn-sm btn-success">Chat Admin</a>
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
                                <td colspan="6">-- Data Kosong --</td>
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

@push('addon-script')
    <script src="{{ url('sweetalert2.all.min.js') }}"></script>

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
