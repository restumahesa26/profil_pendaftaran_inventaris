@extends('layouts.admin')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lengkapi Data Pendaftaran - Data Anak</h4>
                @if ($status)
                <form action="{{ route('pendaftaran.data-anak.store', $id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Anak</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Anak" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="panggilan">Nama Panggilan Anak</label>
                                <input type="text" name="panggilan" class="form-control @error('panggilan') is-invalid @enderror" id="panggilan" placeholder="Masukkan Nama Panggilan Anak" value="{{ old('panggilan') }}" required>
                                @error('panggilan')
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
                                <label for="tempat_lahir">Tempat Lahir Anak</label>
                                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan Tempat Lahir Anak" value="{{ old('tempat_lahir') }}" required>
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir Anak</label>
                                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Anak" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="" hidden>--Pilih Jenis Kelamin--</option>
                                    <option value="l" @if(old('jenis_kelamin') == 'l') selected @endif>Laki-Laki</option>
                                    <option value="p" @if(old('jenis_kelamin') == 'p') selected @endif>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
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
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="" hidden>--Pilih Agama--</option>
                                    <option value="islam" @if(old('agama') == 'islam') selected @endif>Islam</option>
                                    <option value="katolik" @if(old('agama') == 'katolik') selected @endif>Kristen Katolik</option>
                                    <option value="protestan" @if(old('agama') == 'protestan') selected @endif>Kristen Protestan</option>
                                    <option value="hindu" @if(old('agama') == 'hindu') selected @endif>Hindu</option>
                                    <option value="buddha" @if(old('agama') == 'buddha') selected @endif>Buddha</option>
                                    <option value="konghucu" @if(old('agama') == 'konghucu') selected @endif>Konghucu</option>
                                </select>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="suku">Suku</label>
                                <input type="text" name="suku" class="form-control @error('suku') is-invalid @enderror" id="suku" placeholder="Masukkan Suku" value="{{ old('suku') }}">
                                @error('suku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" placeholder="Masukkan Asal Sekolah" value="{{ old('asal_sekolah') }}" required>
                                @error('asal_sekolah')
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
                                <label for="anak_ke">Anak ke-</label>
                                <input type="number" name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" id="anak_ke" placeholder="Masukkan Anak ke-" value="{{ old('anak_ke') }}" required>
                                @error('anak_ke')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah_saudara">Jumlah Saudara</label>
                                <input type="number" name="jumlah_saudara" class="form-control @error('jumlah_saudara') is-invalid @enderror" id="jumlah_saudara" placeholder="Masukkan Jumlah Saudara" value="{{ old('jumlah_saudara') }}" required>
                                @error('jumlah_saudara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_keluarga">Status Keluarga</label>
                                <select name="status_keluarga" id="status_keluarga" class="form-control">
                                    <option value="" hidden>--Pilih Status Keluarga--</option>
                                    <option value="anak-kandung" @if(old('status_keluarga') == 'anak-kandung') selected @endif>Anak Kandung</option>
                                    <option value="anak-angkat" @if(old('status_keluarga') == 'anak-angkat') selected @endif>Anak Angkat</option>
                                </select>
                                @error('status_keluarga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hobi">Hobi Anak</label>
                                <input type="text" name="hobi" class="form-control @error('hobi') is-invalid @enderror" id="hobi" placeholder="Masukkan Hobi Anak" value="{{ old('hobi') }}">
                                @error('hobi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cita_cita">Cita-Cita Anak</label>
                                <input type="text" name="cita_cita" class="form-control @error('cita_cita') is-invalid @enderror" id="cita_cita" placeholder="Masukkan Cita-Cita Anak" value="{{ old('cita_cita') }}">
                                @error('cita_cita')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}" required>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Prestasi <button type="button" name="add" class="add btn btn-primary btn-sm">Tambah Prestasi</button></label>
                            <div class="form-group">
                                <table id="prestasi" class="w-100">
                                    <tr>
                                        <td><input type="text" name="prestasi[]" placeholder="Masukkan Prestasi" class="form-control mt-2" required></td>
                                    </tr>
                                </table>
                                @error('prestasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Riwayat Penyakit <button type="button" name="add2" class="add2 btn btn-primary btn-sm">Tambah Penyakit</button></label>
                                <table id="penyakit" class="w-100">
                                    <tr>
                                        <td><input type="text" name="penyakit[]" placeholder="Masukkan Penyakit" class="form-control" required></td>
                                    </tr>
                                </table>
                                @error('penyakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Treatment <button type="button" name="add3" class="add3 btn btn-primary btn-sm">Tambah Treatment</button></label>
                                <table id="treatment" class="w-100">
                                    <tr>
                                        <td><input type="text" name="treatment[]" placeholder="Masukkan Treatment" class="form-control" required></td>
                                    </tr>
                                </table>
                                @error('treatment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan Data Anak</button>
                    </div>
                </form>
                @else
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Anak</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Anak" value="{{ $item->nama }}" readonly>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="panggilan">Nama Panggilan Anak</label>
                            <input type="text" name="panggilan" class="form-control @error('panggilan') is-invalid @enderror" id="panggilan" placeholder="Masukkan Nama Panggilan Anak" value="{{ $item->panggilan }}" readonly>
                            @error('panggilan')
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
                            <label for="tempat_lahir">Tempat Lahir Anak</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan Tempat Lahir Anak" value="{{ $item->tempat_lahir }}" readonly>
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir Anak</label>
                            <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Anak" value="{{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}" readonly>
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" placeholder="Masukkan Nama Panggilan Anak" value="{{ $item->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}" readonly>
                            @error('jenis_kelamin')
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
                            <label for="agama">Agama</label>
                            <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Masukkan Nama Panggilan Anak" value="@if ($item->agama == 'islam')Islam @elseif ($item->agama == 'katolik')Kristen Katolik @elseif ($item->agama == 'protestan')Kristen Protestan @elseif ($item->agama == 'hindu')Hindu @elseif ($item->agama == 'buddha')Buddha @elseif ($item->agama == 'konghucu')Konghucu @endif" readonly>
                            @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="suku">Suku</label>
                            <input type="text" name="suku" class="form-control @error('suku') is-invalid @enderror" id="suku" placeholder="Masukkan Suku" value="{{ $item->suku }}" readonly>
                            @error('suku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" placeholder="Masukkan Asal Sekolah" value="{{ $item->asal_sekolah }}" readonly>
                            @error('asal_sekolah')
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
                            <label for="anak_ke">Anak ke-</label>
                            <input type="text" name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" id="anak_ke" placeholder="Masukkan Anak ke-" value="{{ $item->anak_ke }}" readonly>
                            @error('anak_ke')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jumlah_saudara">Jumlah Saudara</label>
                            <input type="text" name="jumlah_saudara" class="form-control @error('jumlah_saudara') is-invalid @enderror" id="jumlah_saudara" placeholder="Masukkan Jumlah Saudara" value="{{ $item->jumlah_saudara }} orang" readonly>
                            @error('jumlah_saudara')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status_keluarga">Status Keluarga</label>
                            <input type="text" name="status_keluarga" class="form-control @error('status_keluarga') is-invalid @enderror" id="status_keluarga" placeholder="Masukkan Anak ke-" value="{{ $item->status_keluarga == 'anak-kandung' ? 'Anak Kandung' : 'Anak Angkat' }}" readonly>
                            @error('status_keluarga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hobi">Hobi Anak</label>
                            <input type="text" name="hobi" class="form-control @error('hobi') is-invalid @enderror" id="hobi" placeholder="Masukkan Hobi Anak" value="{{ $item->hobi }}" readonly>
                            @error('hobi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cita_cita">Cita-Cita Anak</label>
                            <input type="text" name="cita_cita" class="form-control @error('cita_cita') is-invalid @enderror" id="cita_cita" placeholder="Masukkan Cita-Cita Anak" value="{{ $item->cita_cita }}" readonly>
                            @error('cita_cita')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" value="{{ $item->alamat }}" readonly>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Prestasi</label>
                        <ol>
                            @forelse ($item->prestasi as $prestasi)
                                <li style="font-size: 14px">{{ $prestasi->nama_prestasi }}</li>
                            @empty

                            @endforelse
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <label for="">Riwayat Penyakit</label>
                        <ol>
                            @forelse ($item->penyakit as $penyakit)
                                <li style="font-size: 14px">{{ $penyakit->nama_penyakit }}</li>
                            @empty

                            @endforelse
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <label for="">Treatment</label>
                        <ol>
                            @forelse ($item->treatment as $treatment)
                                <li style="font-size: 14px">{{ $treatment->nama_treatment }}</li>
                            @empty

                            @endforelse
                        </ol>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary">Kembali Ke Halaman Pendaftaran</a>
                    <a href="{{ route('pendaftaran.data-ayah', $id) }}" class="btn btn-primary">Selanjutnya</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        var i = 0;
        $(".add").click(function () {
            ++i;
            $("#prestasi").append('<tr><td><input type="text" name="prestasi[]" placeholder="Masukkan Prestasi" class="form-control"></td><td><button type="button" class="remove-tr btn btn-danger btn-sm">Hapus</button></td></tr>');
        });
        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });
        $(".add2").click(function () {
            ++i;
            $("#penyakit").append('<tr><td><input type="text" name="penyakit[]" placeholder="Masukkan Penyakit" class="form-control"></td><td><button type="button" class="remove-tr-2 btn btn-danger btn-sm">Hapus</button></td></tr>');
        });
        $(document).on('click', '.remove-tr-2', function () {
            $(this).parents('tr').remove();
        });
        $(".add3").click(function () {
            ++i;
            $("#treatment").append('<tr><td><input type="text" name="treatment[]" placeholder="Masukkan Treatment" class="form-control"></td><td><button type="button" class="remove-tr-3 btn btn-danger btn-sm">Hapus</button></td></tr>');
        });
        $(document).on('click', '.remove-tr-3', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endpush
