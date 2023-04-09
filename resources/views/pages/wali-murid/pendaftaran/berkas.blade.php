@extends('layouts.admin')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lengkapi Berkas Pendaftaran</h4>
                @if ($status)
                <form action="{{ route('pendaftaran.berkas.store', $id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kartu_keluarga">Kartu Keluarga <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="kartu_keluarga" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" placeholder="Masukkan Kartu Keluarga" value="{{ old('kartu_keluarga') }}" required>
                                @error('kartu_keluarga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ktp">KTP <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="ktp" class="form-control @error('ktp') is-invalid @enderror" id="ktp" placeholder="Masukkan KTP" value="{{ old('ktp') }}" required>
                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akta_kelahiran">Akta Kelahiran <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="akta_kelahiran" class="form-control @error('akta_kelahiran') is-invalid @enderror" id="akta_kelahiran" placeholder="Masukkan Akta Kelahiran" value="{{ old('akta_kelahiran') }}" required>
                                @error('akta_kelahiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="print_nisn">Print NISN Dari Sekolah <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="print_nisn" class="form-control @error('print_nisn') is-invalid @enderror" id="print_nisn" placeholder="Masukkan Print NISN" value="{{ old('print_nisn') }}" required>
                                @error('print_nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pas_foto">Pas Foto <sup class="text-danger">(.jpg/.jpeg/.png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="pas_foto" class="form-control @error('pas_foto') is-invalid @enderror" id="pas_foto" placeholder="Masukkan Pas Foto" value="{{ old('pas_foto') }}" required>
                                @error('pas_foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ijazah">Ijazah <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="ijazah" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" placeholder="Masukkan Ijazah" value="{{ old('ijazah') }}" required>
                                @error('ijazah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="skhun">Surat Keterangan Hasil Ujian Nasional <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="skhun" class="form-control @error('skhun') is-invalid @enderror" id="skhun" placeholder="Masukkan Surat Keterangan Hasil Ujian Nasional" value="{{ old('skhun') }}" required>
                                @error('skhun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="identitas_raport">Identitas Siswa Pada Raport <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="identitas_raport" class="form-control @error('identitas_raport') is-invalid @enderror" id="identitas_raport" placeholder="Masukkan Identitas Raport" value="{{ old('identitas_raport') }}" required>
                                @error('identitas_raport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="skbb">Surat Keterangan Berkelakuan Baik Dari Sekolah <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="skbb" class="form-control @error('skbb') is-invalid @enderror" id="skbb" placeholder="Masukkan Surat Keterangan Berkelakuan Baik" value="{{ old('skbb') }}" required>
                                @error('skbb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kartu">Kartu KIP/BPJS/KIS/PKH <sup class="text-danger">(.jpg/jpeg/png)</sup></label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" name="kartu" class="form-control @error('kartu') is-invalid @enderror" id="kartu" placeholder="Masukkan Kartu KIP/BPJS/KIS/PKH" value="{{ old('kartu') }}" required>
                                @error('kartu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pendaftaran.data-tambahan', $id) }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Berkas Pendaftaran</button>
                    </div>
                </form>
                @else
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
                                            <img src="{{ asset('images/berkas/kartu-keluarga/' . $item->kartu_keluarga) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/ktp/' . $item->ktp) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/akta-kelahiran/' . $item->akta_kelahiran) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/print-nisn/' . $item->print_nisn) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/pas-foto/' . $item->pas_foto) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/ijazah/' . $item->ijazah) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/skhun/' . $item->skhun) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/identitas-raport/' . $item->identitas_raport) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/skbb/' . $item->skbb) }}" alt="" srcset="" style="width: 100%">
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
                                            <img src="{{ asset('images/berkas/kartu/' . $item->kartu) }}" alt="" srcset="" style="width: 100%">
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
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pendaftaran.data-tambahan', $id) }}" class="btn btn-primary">Kembali</a>
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary">Kembali Ke Halaman Pendaftaran</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
