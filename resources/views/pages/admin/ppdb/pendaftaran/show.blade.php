@extends('layouts.admin')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Data Pendaftaran - {{ $item->wali_murid->nama }}</div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Data Anak
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="{{ route('admin-pendaftaran.update-data-anak', $anak->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Anak</label>
                                                <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    placeholder="Masukkan Nama Anak"
                                                    value="{{ old('nama', $anak->nama) }}" required>
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
                                                <input type="text" name="panggilan"
                                                    class="form-control @error('panggilan') is-invalid @enderror"
                                                    id="panggilan" placeholder="Masukkan Nama Panggilan Anak"
                                                    value="{{ old('panggilan', $anak->panggilan) }}" required>
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
                                                <input type="text" name="tempat_lahir"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" placeholder="Masukkan Tempat Lahir Anak"
                                                    value="{{ old('tempat_lahir', $anak->tempat_lahir) }}" required>
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
                                                <input type="date" name="tanggal_lahir"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Anak"
                                                    value="{{ old('tanggal_lahir', $anak->tanggal_lahir) }}" required>
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
                                                    <option value="l" @if(old('jenis_kelamin', $anak->jenis_kelamin) ==
                                                        'l') selected
                                                        @endif>Laki-Laki</option>
                                                    <option value="p" @if(old('jenis_kelamin', $anak->jenis_kelamin) ==
                                                        'p') selected
                                                        @endif>Perempuan</option>
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
                                                    <option value="islam" @if(old('agama', $anak->agama) == 'islam')
                                                        selected
                                                        @endif>Islam</option>
                                                    <option value="katolik" @if(old('agama', $anak->agama) == 'katolik')
                                                        selected
                                                        @endif>Kristen Katolik</option>
                                                    <option value="protestan" @if(old('agama', $anak->agama) ==
                                                        'protestan') selected
                                                        @endif>Kristen Protestan</option>
                                                    <option value="hindu" @if(old('agama', $anak->agama) == 'hindu')
                                                        selected
                                                        @endif>Hindu</option>
                                                    <option value="buddha" @if(old('agama', $anak->agama) == 'buddha')
                                                        selected
                                                        @endif>Buddha</option>
                                                    <option value="konghucu" @if(old('agama', $anak->agama) ==
                                                        'konghucu') selected
                                                        @endif>Konghucu</option>
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
                                                <input type="text" name="suku"
                                                    class="form-control @error('suku') is-invalid @enderror" id="suku"
                                                    placeholder="Masukkan Suku" value="{{ old('suku', $anak->suku) }}">
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
                                                <input type="text" name="asal_sekolah"
                                                    class="form-control @error('asal_sekolah') is-invalid @enderror"
                                                    id="asal_sekolah" placeholder="Masukkan Asal Sekolah"
                                                    value="{{ old('asal_sekolah', $anak->asal_sekolah) }}" required>
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
                                                <input type="number" name="anak_ke"
                                                    class="form-control @error('anak_ke') is-invalid @enderror"
                                                    id="anak_ke" placeholder="Masukkan Anak ke-"
                                                    value="{{ old('anak_ke', $anak->anak_ke) }}" required>
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
                                                <input type="number" name="jumlah_saudara"
                                                    class="form-control @error('jumlah_saudara') is-invalid @enderror"
                                                    id="jumlah_saudara" placeholder="Masukkan Jumlah Saudara"
                                                    value="{{ old('jumlah_saudara', $anak->jumlah_saudara) }}" required>
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
                                                <select name="status_keluarga" id="status_keluarga"
                                                    class="form-control">
                                                    <option value="" hidden>--Pilih Status Keluarga--</option>
                                                    <option value="anak-kandung" @if(old('status_keluarga', $anak->
                                                        status_keluarga) ==
                                                        'anak-kandung') selected @endif>Anak Kandung</option>
                                                    <option value="anak-angkat" @if(old('status_keluarga', $anak->
                                                        status_keluarga) ==
                                                        'anak-angkat') selected @endif>Anak Angkat</option>
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
                                                <input type="text" name="hobi"
                                                    class="form-control @error('hobi') is-invalid @enderror" id="hobi"
                                                    placeholder="Masukkan Hobi Anak"
                                                    value="{{ old('hobi', $anak->hobi) }}">
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
                                                <input type="text" name="cita_cita"
                                                    class="form-control @error('cita_cita') is-invalid @enderror"
                                                    id="cita_cita" placeholder="Masukkan Cita-Cita Anak"
                                                    value="{{ old('cita_cita', $anak->cita_cita) }}">
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
                                        <input type="text" name="alamat"
                                            class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                            placeholder="Masukkan Alamat" value="{{ old('alamat', $anak->alamat) }}"
                                            required>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan Data
                                            Anak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Data Ayah
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="{{ route('admin-pendaftaran.update-data-ayah', $ayah->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Ayah</label>
                                                <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    placeholder="Masukkan Nama Ayah"
                                                    value="{{ old('nama', $ayah->nama) }}" required>
                                                @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="panggilan">Nama Panggilan Ayah</label>
                                                <input type="text" name="panggilan"
                                                    class="form-control @error('panggilan') is-invalid @enderror"
                                                    id="panggilan" placeholder="Masukkan Nama Panggilan Ayah"
                                                    value="{{ old('panggilan', $ayah->panggilan) }}" required>
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
                                                <label for="tempat_lahir">Tempat Lahir Ayah</label>
                                                <input type="text" name="tempat_lahir"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" placeholder="Masukkan Tempat Lahir Ayah"
                                                    value="{{ old('tempat_lahir', $ayah->tempat_lahir) }}" required>
                                                @error('tempat_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir Ayah</label>
                                                <input type="date" name="tanggal_lahir"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Ayah"
                                                    value="{{ old('tanggal_lahir', $ayah->tanggal_lahir) }}" required>
                                                @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="no_hp">Nomor Handphone</label>
                                                <input type="number" name="no_hp"
                                                    class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                                    placeholder="Masukkan Nomor Handphone"
                                                    value="{{ old('no_hp', $ayah->no_hp) }}" required>
                                                @error('no_hp')
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
                                                    <option value="islam" @if(old('agama', $ayah->agama) == 'islam')
                                                        selected
                                                        @endif>Islam</option>
                                                    <option value="katolik" @if(old('agama', $ayah->agama) == 'katolik')
                                                        selected
                                                        @endif>Kristen Katolik</option>
                                                    <option value="protestan" @if(old('agama', $ayah->agama) ==
                                                        'protestan') selected
                                                        @endif>Kristen Protestan</option>
                                                    <option value="hindu" @if(old('agama', $ayah->agama) == 'hindu')
                                                        selected
                                                        @endif>Hindu</option>
                                                    <option value="buddha" @if(old('agama', $ayah->agama) == 'buddha')
                                                        selected
                                                        @endif>Buddha</option>
                                                    <option value="konghucu" @if(old('agama', $ayah->agama) ==
                                                        'konghucu') selected
                                                        @endif>Konghucu</option>
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
                                                <input type="text" name="suku"
                                                    class="form-control @error('suku') is-invalid @enderror" id="suku"
                                                    placeholder="Masukkan Suku" value="{{ old('suku', $ayah->suku) }}">
                                                @error('suku')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                                    class="form-control">
                                                    <option value="" hidden>--Pilih Pendidikan Terakhir--</option>
                                                    <option value="Tidak Sekolah" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir) == 'Tidak Sekolah') selected @endif>Tidak
                                                        Sekolah</option>
                                                    <option value="SD Sederajat" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir) == 'SD Sederajat') selected @endif>SD
                                                        Sederajat</option>
                                                    <option value="SMP Sederajat" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir) == 'SMP Sederajat') selected @endif>SMP
                                                        Sederajat</option>
                                                    <option value="SMA Sederajat" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir) == 'SMA Sederajat') selected @endif>SMA
                                                        Sederajat</option>
                                                    <option value="Diploma 1" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir)
                                                        == 'Diploma 1') selected @endif>Diploma 1</option>
                                                    <option value="Diploma 2" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir)
                                                        == 'Diploma 2') selected @endif>Diploma 2</option>
                                                    <option value="Diploma 3" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir)
                                                        == 'Diploma 3') selected @endif>Diploma 3</option>
                                                    <option value="Diploma 4" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir)
                                                        == 'Diploma 4') selected @endif>Diploma 4</option>
                                                    <option value="Sarjana" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir)
                                                        == 'Sarjana') selected @endif>Sarjana</option>
                                                    <option value="Magister" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir)
                                                        == 'Magister') selected @endif>Magister</option>
                                                    <option value="Doktor" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir) ==
                                                        'Doktor') selected @endif>Doktor</option>
                                                    <option value="Lainnya" @if(old('pendidikan_terakhir', $ayah->
                                                        pendidikan_terakhir)
                                                        == 'Lainnya') selected @endif>Lainnya</option>
                                                </select>
                                                @error('pendidikan_terakhir')
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
                                                <label for="jumlah_anak">Jumlah Anak</label>
                                                <input type="number" name="jumlah_anak"
                                                    class="form-control @error('jumlah_anak') is-invalid @enderror"
                                                    id="jumlah_anak" placeholder="Masukkan Jumlah Anak"
                                                    value="{{ old('jumlah_anak', $ayah->jumlah_anak) }}" required>
                                                @error('jumlah_anak')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="penghasilan">Penghasilan</label>
                                                <input type="text" name="penghasilan"
                                                    class="form-control @error('penghasilan') is-invalid @enderror"
                                                    id="penghasilan" placeholder="Masukkan Penghasilan"
                                                    value="@rupiah(old('penghasilan', $ayah->penghasilan))"
                                                    data-type="rupiah" required>
                                                @error('penghasilan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status_nikah">Status Nikah</label>
                                                <select name="status_nikah" id="status_nikah" class="form-control">
                                                    <option value="" hidden>--Pilih Status Nikah--</option>
                                                    <option value="kawin-tercatat" @if(old('status_nikah', $ayah->
                                                        status_nikah) ==
                                                        'kawin-tercatat') selected @endif>Kawin Tercatat</option>
                                                    <option value="kawin-belum-tercatat" @if(old('status_nikah', $ayah->
                                                        status_nikah) ==
                                                        'kawin-belum-tercatat') selected @endif>Kawin Belum Tercatat
                                                    </option>
                                                    <option value="cerai-hidup" @if(old('status_nikah', $ayah->
                                                        status_nikah) ==
                                                        'cerai-hidup') selected @endif>Cerai Hidup</option>
                                                    <option value="cerai-mati" @if(old('status_nikah', $ayah->
                                                        status_nikah) ==
                                                        'cerai-mati') selected @endif>Cerai Mati</option>
                                                </select>
                                                @error('status_nikah')
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
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" name="pekerjaan"
                                                    class="form-control @error('pekerjaan') is-invalid @enderror"
                                                    id="pekerjaan" placeholder="Masukkan Pekerjaan"
                                                    value="{{ old('pekerjaan', $ayah->pekerjaan) }}">
                                                @error('pekerjaan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    id="alamat" placeholder="Masukkan Alamat"
                                                    value="{{ old('alamat', $ayah->alamat) }}" required>
                                                @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan Data
                                            Ayah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Data Ibu
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="{{ route('admin-pendaftaran.update-data-ibu', $ibu->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Ibu</label>
                                                <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    placeholder="Masukkan Nama Ibu"
                                                    value="{{ old('nama', $ibu->nama) }}" required>
                                                @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="panggilan">Nama Panggilan Ibu</label>
                                                <input type="text" name="panggilan"
                                                    class="form-control @error('panggilan') is-invalid @enderror"
                                                    id="panggilan" placeholder="Masukkan Nama Panggilan Ibu"
                                                    value="{{ old('panggilan', $ibu->panggilan) }}" required>
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
                                                <label for="tempat_lahir">Tempat Lahir Ibu</label>
                                                <input type="text" name="tempat_lahir"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" placeholder="Masukkan Tempat Lahir Ibu"
                                                    value="{{ old('tempat_lahir', $ibu->tempat_lahir) }}" required>
                                                @error('tempat_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir Ibu</label>
                                                <input type="date" name="tanggal_lahir"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Ibu"
                                                    value="{{ old('tanggal_lahir', $ibu->tanggal_lahir) }}" required>
                                                @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="no_hp">Nomor Handphone</label>
                                                <input type="number" name="no_hp"
                                                    class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                                    placeholder="Masukkan Nomor Handphone"
                                                    value="{{ old('no_hp', $ibu->no_hp) }}" required>
                                                @error('no_hp')
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
                                                    <option value="islam" @if(old('agama', $ibu->agama) == 'islam')
                                                        selected @endif>Islam</option>
                                                    <option value="katolik" @if(old('agama', $ibu->agama) == 'katolik')
                                                        selected @endif>Kristen Katolik</option>
                                                    <option value="protestan" @if(old('agama', $ibu->agama) ==
                                                        'protestan') selected @endif>Kristen Protestan</option>
                                                    <option value="hindu" @if(old('agama', $ibu->agama) == 'hindu')
                                                        selected @endif>Hindu</option>
                                                    <option value="buddha" @if(old('agama', $ibu->agama) == 'buddha')
                                                        selected @endif>Buddha</option>
                                                    <option value="konghucu" @if(old('agama', $ibu->agama) ==
                                                        'konghucu') selected @endif>Konghucu</option>
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
                                                <input type="text" name="suku"
                                                    class="form-control @error('suku') is-invalid @enderror" id="suku"
                                                    placeholder="Masukkan Suku" value="{{ old('suku', $ibu->suku) }}">
                                                @error('suku')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                                    class="form-control">
                                                    <option value="" hidden>--Pilih Pendidikan Terakhir--</option>
                                                    <option value="Tidak Sekolah" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Tidak Sekolah') selected @endif>Tidak
                                                        Sekolah</option>
                                                    <option value="SD Sederajat" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'SD Sederajat') selected @endif>SD
                                                        Sederajat</option>
                                                    <option value="SMP Sederajat" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'SMP Sederajat') selected @endif>SMP
                                                        Sederajat</option>
                                                    <option value="SMA Sederajat" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'SMA Sederajat') selected @endif>SMA
                                                        Sederajat</option>
                                                    <option value="Diploma 1" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Diploma 1') selected @endif>Diploma 1
                                                    </option>
                                                    <option value="Diploma 2" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Diploma 2') selected @endif>Diploma 2
                                                    </option>
                                                    <option value="Diploma 3" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Diploma 3') selected @endif>Diploma 3
                                                    </option>
                                                    <option value="Diploma 4" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Diploma 4') selected @endif>Diploma 4
                                                    </option>
                                                    <option value="Sarjana" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Sarjana') selected @endif>Sarjana
                                                    </option>
                                                    <option value="Magister" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Magister') selected @endif>Magister
                                                    </option>
                                                    <option value="Doktor" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Doktor') selected @endif>Doktor
                                                    </option>
                                                    <option value="Lainnya" @if(old('pendidikan_terakhir', $ibu->
                                                        pendidikan_terakhir) == 'Lainnya') selected @endif>Lainnya
                                                    </option>
                                                </select>
                                                @error('pendidikan_terakhir')
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
                                                <label for="jumlah_anak">Jumlah Anak</label>
                                                <input type="number" name="jumlah_anak"
                                                    class="form-control @error('jumlah_anak') is-invalid @enderror"
                                                    id="jumlah_anak" placeholder="Masukkan Jumlah Anak"
                                                    value="{{ old('jumlah_anak', $ibu->jumlah_anak) }}" required>
                                                @error('jumlah_anak')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="penghasilan">Penghasilan</label>
                                                <input type="text" name="penghasilan"
                                                    class="form-control @error('penghasilan') is-invalid @enderror"
                                                    id="penghasilan" placeholder="Masukkan Penghasilan"
                                                    value="@rupiah(old('penghasilan', $ibu->penghasilan))"
                                                    data-type="rupiah" required>
                                                @error('penghasilan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status_nikah">Status Nikah</label>
                                                <select name="status_nikah" id="status_nikah" class="form-control">
                                                    <option value="" hidden>--Pilih Status Nikah--</option>
                                                    <option value="kawin-tercatat" @if(old('status_nikah', $ibu->
                                                        status_nikah) == 'kawin-tercatat') selected @endif>Kawin
                                                        Tercatat</option>
                                                    <option value="kawin-belum-tercatat" @if(old('status_nikah', $ibu->
                                                        status_nikah) == 'kawin-belum-tercatat') selected
                                                        @endif>Kawin Belum Tercatat</option>
                                                    <option value="cerai-hidup" @if(old('status_nikah', $ibu->
                                                        status_nikah) == 'cerai-hidup') selected @endif>Cerai
                                                        Hidup</option>
                                                    <option value="cerai-mati" @if(old('status_nikah', $ibu->
                                                        status_nikah) == 'cerai-mati') selected @endif>Cerai Mati
                                                    </option>
                                                </select>
                                                @error('status_nikah')
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
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" name="pekerjaan"
                                                    class="form-control @error('pekerjaan') is-invalid @enderror"
                                                    id="pekerjaan" placeholder="Masukkan Pekerjaan"
                                                    value="{{ old('pekerjaan', $ibu->pekerjaan) }}">
                                                @error('pekerjaan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    id="alamat" placeholder="Masukkan Alamat"
                                                    value="{{ old('alamat', $ibu->alamat) }}" required>
                                                @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan Data Ibu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Data Tambahan
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="{{ route('admin-pendaftaran.update-data-tambahan', $tambahan->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kebiasaan_anak">Kebiasaan Anak Di Rumah</label>
                                                <textarea name="kebiasaan_anak" id="kebiasaan_anak" cols="10" rows="10"
                                                    class="form-control @error('kebiasaan_anak') is-invalid @enderror"
                                                    placeholder="Masukkan Kebiasaan Anak Di Rumah"
                                                    required>{{ old('kebiasaan_anak', $tambahan->kebiasaan_anak) }}</textarea>
                                                @error('kebiasaan_anak')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pola_asuh">Pola Asuh Orang Tua</label>
                                                <textarea name="pola_asuh" id="pola_asuh" cols="10" rows="10"
                                                    class="form-control @error('pola_asuh') is-invalid @enderror"
                                                    placeholder="Masukkan Pola Asuh Orang Tua"
                                                    required>{{ old('pola_asuh', $tambahan->pola_asuh) }}</textarea>
                                                @error('pola_asuh')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pantangan">Pantangan Makanan Anak</label>
                                                <textarea name="pantangan" id="pantangan" cols="10" rows="10"
                                                    class="form-control @error('pantangan') is-invalid @enderror"
                                                    placeholder="Masukkan Pantangan Makanan Anak"
                                                    required>{{ old('pantangan', $tambahan->pantangan) }}</textarea>
                                                @error('pantangan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="karakter_anak">Karakter Anak</label>
                                                <textarea name="karakter_anak" id="karakter_anak" cols="10" rows="10"
                                                    class="form-control @error('karakter_anak') is-invalid @enderror"
                                                    placeholder="Masukkan Karakter Anak"
                                                    required>{{ old('karakter_anak', $tambahan->karakter_anak) }}</textarea>
                                                @error('karakter_anak')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alasan">Alasan Anak Masuk MTS</label>
                                                <textarea name="alasan" id="alasan" cols="10" rows="10"
                                                    class="form-control @error('alasan') is-invalid @enderror"
                                                    placeholder="Masukkan Alasan Anak Masuk MTS"
                                                    required>{{ old('alasan', $tambahan->alasan) }}</textarea>
                                                @error('alasan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="harapan_ortu">Harapan Orang Tua</label>
                                                <textarea name="harapan_ortu" id="harapan_ortu" cols="10" rows="10"
                                                    class="form-control @error('harapan_ortu') is-invalid @enderror"
                                                    placeholder="Masukkan Harapan Orang Tua"
                                                    required>{{ old('harapan_ortu', $tambahan->harapan_ortu) }}</textarea>
                                                @error('harapan_ortu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan Data
                                            Tambahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Berkas Pendaftaran
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action=""
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kartu_keluarga">Kartu Keluarga</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#kartu_keluarga">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="kartu_keluarga" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Kartu Keluarga</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/kartu-keluarga/' . $berkas->kartu_keluarga) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ktp">KTP</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#ktp">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="ktp" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">KTP</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/ktp/' . $berkas->ktp) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="akta_kelahiran">Akta Kelahiran</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#akta_kelahiran">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="akta_kelahiran" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Akta Kelahiran</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/akta-kelahiran/' . $berkas->akta_kelahiran) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="print_nisn">Print NISN Dari Sekolah</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#print_nisn">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="print_nisn" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Print NISN Dari Sekolah</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/print-nisn/' . $berkas->print_nisn) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pas_foto">Pas Foto</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#pas_foto">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="pas_foto" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Pas Foto</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/pas-foto/' . $berkas->pas_foto) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ijazah">Ijazah</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#ijazah">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="ijazah" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ijazah</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/ijazah/' . $berkas->ijazah) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="skhun">Surat Keterangan Hasil Ujian Nasional</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#skhun">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="skhun" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Hasil Ujian Nasional</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/skhun/' . $berkas->skhun) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="identitas_raport">Identitas Siswa Pada Raport</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#identitas_raport">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="identitas_raport" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Identitas Siswa Pada Raport</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/identitas-raport/' . $berkas->identitas_raport) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="skbb">Surat Keterangan Berkelakuan Baik Dari Sekolah</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#skbb">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="skbb" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Berkelakuan Baik Dari Sekolah</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/skbb/' . $berkas->skbb) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kartu">Kartu KIP/BPJS/KIS/PKH</label><br>
                                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#kartu">
                                                    Lihat File
                                                </button>
                                                <div class="modal fade" id="kartu" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Kartu KIP/BPJS/KIS/PKH</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('images/berkas/kartu/' . $berkas->kartu) }}" alt="" srcset="" style="width: 100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    @if ($item->checkDataAnak($item->id) || $item->checkDataAyah($item->id) ||
                    $item->checkDataIbu($item->id) || $item->checkDataTambahan($item->id))
                    <span class="badge bg-info">Data Belum Diisi Dengan Lengkap</span>
                    @else
                    @if ($item->status == 'tunggu')
                    <a href="{{ route('admin-pendaftaran.verifikasi', $item->id) }}"
                        class="btn btn-primary mt-3 mx-1 btn-verifikasi">Verifikasi Pendaftaran</a>
                    @elseif ($item->status == 'verifikasi')
                    <h4 class="text-success font-weight-bold mt-3">Data Sudah Diverifikasi</h4><br>
                    @endif
                    @endif
                </div>
                @if ($item->status == 'verifikasi')
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Masukkan Jadwal Tes
                    </button>
                    <button type="button" class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        Masukkan Status Hasil Tes
                    </button>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Jadwal Tes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin-pendaftaran.store-jadwal-tes', $item->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="tanggal_tes">Tanggal Tes</label>
                                        <input type="date" name="tanggal_tes"
                                            class="form-control @error('tanggal_tes') is-invalid @enderror"
                                            id="tanggal_tes" placeholder="Masukkan Tanggal Tes"
                                            value="{{ old('tanggal_tes', $item->tanggal_tes) }}" required>
                                        @error('tanggal_tes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu_tes">Waktu Tes</label>
                                        <input type="time" name="waktu_tes"
                                            class="form-control @error('waktu_tes') is-invalid @enderror"
                                            id="waktu_tes" placeholder="Masukkan Waktu Tes"
                                            value="{{ old('waktu_tes', $item->waktu_tes) }}" required>
                                        @error('waktu_tes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="ruang_tes">Ruang Tes</label>
                                        <input type="text" name="ruang_tes"
                                            class="form-control @error('ruang_tes') is-invalid @enderror"
                                            id="ruang_tes" placeholder="Masukkan Ruang Tes"
                                            value="{{ old('ruang_tes', $item->ruang_tes) }}" required>
                                        @error('ruang_tes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Jadwal Tes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Status Hasil Tes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin-pendaftaran.store-hasil-tes', $item->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="lulus">Pilih Status Hasil Tes</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status_tes" id="lulus"
                                                    value="lulus" @if (old('status_tes', $item->status_tes) == 'lulus') checked @endif required>
                                                Lulus
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status_tes" id="tidak-lulus"
                                                    value="tidak-lulus" @if (old('status_tes', $item->status_tes) == 'tidak-lulus') checked @endif required>
                                                Tidak Lulus
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Status Hasil Tes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="{{ url('sweetalert2.all.min.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    $('.btn-verifikasi').on('click', function (e) {
        e.preventDefault(); // prevent form submit
        var form = $(this).attr('href');
        Swal.fire({
            title: 'Verifikasi Pendaftaran?',
            text: "Pendaftaran Akan Diverifikasi",
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
        var form = event.target.form;
        Swal.fire({
            title: 'Tolak Pendaftaran?',
            text: "Pendaftaran Akan Ditolak",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Tolak',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else {
                //
            }
        });
    });
</script>
<script>
    $("input[data-type='rupiah']").on({
        keyup: function () {
            formatCurrency($(this));
        }
    });

    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }

    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.
        // get input value
        var input_val = input.val();
        // don't validate empty input
        if (input_val === "") {
            return;
        }
        // original length
        var original_len = input_val.length;
        // initial caret position
        var caret_pos = input.prop("selectionStart");
        // check for decimal
        if (input_val.indexOf(".") >= 0) {
            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");
            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);
            // add commas to left side of number
            left_side = formatNumber(left_side);
            // validate right side
            right_side = formatNumber(right_side);
            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }
            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 15);
            // join number by .
            input_val = "Rp" + left_side + ". " + right_side;
        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "Rp." + input_val;
            // final formatting
            if (blur === "blur") {
                input_val += ".00";
            }
        }
        // send updated string to input
        input.val(input_val);
        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
@endpush
