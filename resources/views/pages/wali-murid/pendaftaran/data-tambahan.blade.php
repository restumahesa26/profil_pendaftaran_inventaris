@extends('layouts.admin')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lengkapi Data Pendaftaran - Data Tambahan</h4>
                @if ($status)
                <form action="{{ route('pendaftaran.data-tambahan.store', $id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kebiasaan_anak">Kebiasaan Anak Di Rumah</label>
                                <textarea name="kebiasaan_anak" id="kebiasaan_anak" cols="10" rows="10" class="form-control @error('kebiasaan_anak') is-invalid @enderror" placeholder="Masukkan Kebiasaan Anak Di Rumah" required>{{ old('kebiasaan_anak') }}</textarea>
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
                                <textarea name="pola_asuh" id="pola_asuh" cols="10" rows="10" class="form-control @error('pola_asuh') is-invalid @enderror" placeholder="Masukkan Pola Asuh Orang Tua" required>{{ old('pola_asuh') }}</textarea>
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
                                <textarea name="pantangan" id="pantangan" cols="10" rows="10" class="form-control @error('pantangan') is-invalid @enderror" placeholder="Masukkan Pantangan Makanan Anak" required>{{ old('pantangan') }}</textarea>
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
                                <textarea name="karakter_anak" id="karakter_anak" cols="10" rows="10" class="form-control @error('karakter_anak') is-invalid @enderror" placeholder="Masukkan Karakter Anak" required>{{ old('karakter_anak') }}</textarea>
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
                                <textarea name="alasan" id="alasan" cols="10" rows="10" class="form-control @error('alasan') is-invalid @enderror" placeholder="Masukkan Alasan Anak Masuk MTS" required>{{ old('alasan') }}</textarea>
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
                                <textarea name="harapan_ortu" id="harapan_ortu" cols="10" rows="10" class="form-control @error('harapan_ortu') is-invalid @enderror" placeholder="Masukkan Harapan Orang Tua" required>{{ old('harapan_ortu') }}</textarea>
                                @error('harapan_ortu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pendaftaran.data-ibu', $id) }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data Tambahan</button>
                    </div>
                </form>
                @else
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kebiasaan_anak">Kebiasaan Anak Di Rumah</label>
                            <textarea name="kebiasaan_anak" id="kebiasaan_anak" cols="10" rows="10" class="form-control @error('kebiasaan_anak') is-invalid @enderror" placeholder="Masukkan Kebiasaan Anak Di Rumah" readonly>{{ $item->kebiasaan_anak }}</textarea>
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
                            <textarea name="pola_asuh" id="pola_asuh" cols="10" rows="10" class="form-control @error('pola_asuh') is-invalid @enderror" placeholder="Masukkan Pola Asuh Orang Tua" readonly>{{ $item->pola_asuh }}</textarea>
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
                            <textarea name="pantangan" id="pantangan" cols="10" rows="10" class="form-control @error('pantangan') is-invalid @enderror" placeholder="Masukkan Pantangan Makanan Anak" readonly>{{ $item->pantangan }}</textarea>
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
                            <textarea name="karakter_anak" id="karakter_anak" cols="10" rows="10" class="form-control @error('karakter_anak') is-invalid @enderror" placeholder="Masukkan Karakter Anak" readonly>{{ $item->karakter_anak }}</textarea>
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
                            <textarea name="alasan" id="alasan" cols="10" rows="10" class="form-control @error('alasan') is-invalid @enderror" placeholder="Masukkan Alasan Anak Masuk MTS" readonly>{{ $item->alasan }}</textarea>
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
                            <textarea name="harapan_ortu" id="harapan_ortu" cols="10" rows="10" class="form-control @error('harapan_ortu') is-invalid @enderror" placeholder="Masukkan Harapan Orang Tua" readonly>{{ $item->harapan_ortu }}</textarea>
                            @error('harapan_ortu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pendaftaran.data-ibu', $id) }}" class="btn btn-primary">Kembali</a>
                    <a href="{{ route('pendaftaran.berkas', $id) }}" class="btn btn-primary">Selanjutnya</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
