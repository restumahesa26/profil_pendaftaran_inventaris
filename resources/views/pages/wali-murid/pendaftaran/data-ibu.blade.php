@extends('layouts.admin')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lengkapi Data Pendaftaran - Data Ibu</h4>
                @if ($status)
                <form action="{{ route('pendaftaran.data-ibu.store', $id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Ibu</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Ibu" value="{{ old('nama') }}" required>
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
                                <input type="text" name="panggilan" class="form-control @error('panggilan') is-invalid @enderror" id="panggilan" placeholder="Masukkan Nama Panggilan Ibu" value="{{ old('panggilan') }}" required>
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
                                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan Tempat Lahir Ibu" value="{{ old('tempat_lahir') }}" required>
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
                                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Ibu" value="{{ old('tanggal_lahir') }}" required>
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
                                <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan Nomor Handphone" value="{{ old('no_hp') }}" required>
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
                                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
                                    <option value="" hidden>--Pilih Pendidikan Terakhir--</option>
                                    <option value="Tidak Sekolah" @if(old('pendidikan_terakhir') == 'Tidak Sekolah') selected @endif>Tidak Sekolah</option>
                                    <option value="SD Sederajat" @if(old('pendidikan_terakhir') == 'SD Sederajat') selected @endif>SD Sederajat</option>
                                    <option value="SMP Sederajat" @if(old('pendidikan_terakhir') == 'SMP Sederajat') selected @endif>SMP Sederajat</option>
                                    <option value="SMA Sederajat" @if(old('pendidikan_terakhir') == 'SMA Sederajat') selected @endif>SMA Sederajat</option>
                                    <option value="Diploma 1" @if(old('pendidikan_terakhir') == 'Diploma 1') selected @endif>Diploma 1</option>
                                    <option value="Diploma 2" @if(old('pendidikan_terakhir') == 'Diploma 2') selected @endif>Diploma 2</option>
                                    <option value="Diploma 3" @if(old('pendidikan_terakhir') == 'Diploma 3') selected @endif>Diploma 3</option>
                                    <option value="Diploma 4" @if(old('pendidikan_terakhir') == 'Diploma 4') selected @endif>Diploma 4</option>
                                    <option value="Sarjana" @if(old('pendidikan_terakhir') == 'Sarjana') selected @endif>Sarjana</option>
                                    <option value="Magister" @if(old('pendidikan_terakhir') == 'Magister') selected @endif>Magister</option>
                                    <option value="Doktor" @if(old('pendidikan_terakhir') == 'Doktor') selected @endif>Doktor</option>
                                    <option value="Lainnya" @if(old('pendidikan_terakhir') == 'Lainnya') selected @endif>Lainnya</option>
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
                                <input type="number" name="jumlah_anak" class="form-control @error('jumlah_anak') is-invalid @enderror" id="jumlah_anak" placeholder="Masukkan Jumlah Anak" value="{{ old('jumlah_anak') }}" required>
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
                                <input type="text" name="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror" id="penghasilan" placeholder="Masukkan Penghasilan" value="{{ old('penghasilan') }}" data-type="rupiah" required>
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
                                    <option value="kawin-tercatat" @if(old('status_nikah') == 'kawin-tercatat') selected @endif>Kawin Tercatat</option>
                                    <option value="kawin-belum-tercatat" @if(old('status_nikah') == 'kawin-belum-tercatat') selected @endif>Kawin Belum Tercatat</option>
                                    <option value="cerai-hidup" @if(old('status_nikah') == 'cerai-hidup') selected @endif>Cerai Hidup</option>
                                    <option value="cerai-mati" @if(old('status_nikah') == 'cerai-mati') selected @endif>Cerai Mati</option>
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
                                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Masukkan Pekerjaan" value="{{ old('pekerjaan') }}">
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
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}" required>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pendaftaran.data-ayah', $id) }}" class="btn btn-primary btn-rounded">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data Ibu</button>
                    </div>
                </form>
                @else
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Ibu</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Ibu" value="{{ $item->nama }}" readonly>
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
                            <input type="text" name="panggilan" class="form-control @error('panggilan') is-invalid @enderror" id="panggilan" placeholder="Masukkan Nama Panggilan Ibu" value="{{ $item->panggilan }}" readonly>
                            @error('panggilan')
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
                            <label for="tempat_lahir">Tempat Lahir Ibu</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan Tempat Lahir Ibu" value="{{ $item->tempat_lahir }}" readonly>
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir Ibu</label>
                            <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Ibu" value="{{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}" readonly>
                            @error('tanggal_lahir')
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
                            <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Masukkan Agama" value="{{ $item->agama }}" readonly>
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
                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir" value="{{ $item->pendidikan_terakhir }}" readonly>
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
                            <input type="number" name="jumlah_anak" class="form-control @error('jumlah_anak') is-invalid @enderror" id="jumlah_anak" placeholder="Masukkan Jumlah Anak" value="{{ $item->jumlah_anak }}" readonly>
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
                            <input type="text" name="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror" id="penghasilan" placeholder="Masukkan Penghasilan" value="@rupiah($item->penghasilan)" readonly>
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
                            <input type="text" name="status_nikah" class="form-control @error('status_nikah') is-invalid @enderror" id="status_nikah" placeholder="Masukkan Status Nikah" value="@if ($item->status_nikah == 'kawin-tercatat')Kawin Tercatat @elseif ($item->status_nikah == 'kawin-tidak-tercatat')Kawin Tidak Tercatat @elseif ($item->status_nikah == 'cerai-hidup')Cerai Hidup @elseif ($item->status_nikah == 'cerai-mati')Cerai Mati @endif" readonly>
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
                            <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Masukkan Pekerjaan" value="{{ $item->pekerjaan }}" readonly>
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
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" value="{{ $item->alamat }}" readonly>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pendaftaran.data-ayah', $id) }}" class="btn btn-primary">Kembali</a>
                    <a href="{{ route('pendaftaran.data-tambahan', $id) }}" class="btn btn-primary">Selanjutnya</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
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
            input_val = "Rp. " + input_val;
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
