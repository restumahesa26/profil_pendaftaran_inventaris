@extends('layouts.admin')

@section('title', 'Pembayaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-content-center">
                    <h4 class="card-title">Data Pembayaran</h4>
                    <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#modalInformasi">
                        Klik Untuk Melihat Tata Cara Pembayaran
                    </button>
                    <div class="modal fade" id="modalInformasi" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tata Cara Pembayaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p style="text-align: justify; font-size: 16px">Apabila Pendaftaran telah diverifikasi, silahkan lakukan pembayaran  dengan cara transfer ke Rekening BRI <strong>0115-01-102720-50-3</strong> atas nama <strong>Andika Saputra</strong> sejumlah Rp.2.500.000</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Wali Murid</th>
                                <th>Periode</th>
                                <th>Status Pembayaran</th>
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
                                    @if ($item->checkPembayaran($item->id))
                                    <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                        Bayar Sekarang
                                    </button>
                                    @elseif ($item->pembayaran->status == 'tunggu' || $item->pembayaran->status == 'terima')
                                    <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal3{{ $item->id }}">
                                        Lihat Bukti Pembayaran
                                    </button>
                                    @elseif ($item->pembayaran->status == 'tolak')
                                    <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $item->id }}">
                                        Bayar Ulang
                                    </button>
                                    @endif
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
                                        <form action="{{ route('pembayaran.store', $item->id) }}" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="bukti_pembayaran">Masukkan Bukti Pembayaran</label>
                                                    <input type="file" name="bukti_pembayaran"
                                                        class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                                                        id="bukti_pembayaran" placeholder="Masukkan Bukti Pembayaran"
                                                        value="{{ old('bukti_pembayaran') }}" required>
                                                    @error('bukti_pembayaran')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if (!$item->checkPembayaran($item->id))
                            <div class="modal fade" id="exampleModal2{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jadwal Tes</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('pembayaran.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="bukti_pembayaran">Masukkan Bukti Pembayaran</label>
                                                    <input type="file" name="bukti_pembayaran"
                                                        class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                                                        id="bukti_pembayaran" placeholder="Masukkan Bukti Pembayaran"
                                                        value="{{ old('bukti_pembayaran') }}" required>
                                                    @error('bukti_pembayaran')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal3{{ $item->id }}" tabindex="-1"
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
                                                <div class="col-12">Jenis Pembayaran : {{ $item->pembayaran->jenis_pembayaran }}</div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-5">Bukti Pembayaran</div>
                                                <div class="col-12 mt-2">
                                                    <img src="{{ url('images/bukti-pembayaran/' . $item->pembayaran->bukti_pembayaran) }}" alt="" srcset="" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
