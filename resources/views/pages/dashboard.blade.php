@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            @if (Auth::user()->role == 'admin')
            <div class="statistics-details d-flex align-items-center justify-content-between">
                <div>
                    <p class="statistics-title">Periode Aktif</p>
                    <h3 class="rate-percentage">{{ $periode != NULL ? $periode->periode : '-' }}</h3>
                </div>
                <div>
                    <p class="statistics-title">Guru dan Staf</p>
                    <h3 class="rate-percentage">{{ $guru == 0 ? '-' : $guru . '  orang' }}</h3>
                </div>
                <div>
                    <p class="statistics-title">Foto Kegiatan</p>
                    <h3 class="rate-percentage">{{ $foto == 0 ? '-' : $foto }}</h3>
                </div>
                <div class="d-none d-md-block">
                    <p class="statistics-title">Anak</p>
                    <h3 class="rate-percentage">{{ $anak == 0 ? '-' : $anak . '  orang' }}</h3>
                </div>
                <div class="d-none d-md-block">
                    <p class="statistics-title">Lulus Tes</p>
                    @if ($pendaftaran)
                        <h3 class="rate-percentage">{{ $pendaftaran == 0 ? '-' : $pendaftaran . '  orang' }}</h3>
                    @else
                        <h3 class="rate-percentage">-</h3>
                    @endif
                </div>
                <div class="d-none d-md-block">
                    <p class="statistics-title">Sudah Verifikasi</p>
                    @if ($pembayaran)
                        <h3 class="rate-percentage">{{ $pembayaran == 0 ? '-' : $pembayaran . '  orang' }}</h3>
                    @else
                        <h3 class="rate-percentage">-</h3>
                    @endif
                </div>
            </div>
            @else
            <h3 class="font-weight-bold mb-3">Data Profile</h3>
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" value="{{ old('nama', Auth::user()->nama) }}" required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" value="{{ old('username', Auth::user()->username) }}" required>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_wa">No Whatsapp Aktif</label>
                            <input type="text" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa" placeholder="+628............." value="{{ old('no_wa', Auth::user()->no_wa) }}" required>
                            @error('no_wa')
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
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" value="{{ old('email', Auth::user()->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Masukkan Konfirmasi Password" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ url('backend/js/select.dataTables.min.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('backend/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ url('backend/js/dashboard.js') }}"></script>
<script src="{{ url('backend/js/Chart.roundedBarCharts.js') }}"></script>
@endpush
