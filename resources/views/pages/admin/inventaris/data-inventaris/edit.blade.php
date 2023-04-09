@extends('layouts.admin')

@section('title', 'Data Inventaris')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-inventaris.index') }}">Data Inventaris</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-inventaris.detail', $item->ruangan_id) }}">{{ $item->ruangan->nama_ruangan }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>
        <div class="card mt-3">
            <div class="card-body">
                <h4 class="card-title">Edit Data Inventaris - {{ $item->ruangan->nama_ruangan }}</h4>
                <form action="{{ route('data-inventaris.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="barang_id">Nama Barang</label>
                                <select name="barang_id" id="barang_id" class="form-control" required>
                                    <option value="" hidden>--Pilih Nama Barang--</option>
                                    @forelse ($items as $item2)
                                        <option value="{{ $item2->id }}" @if(old('barang_id', $item->barang_id) == $item2->id) selected @endif>{{ $item2->nama_barang }}</option>
                                    @empty

                                    @endforelse
                                </select>
                                @error('barang_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Harga" data-type="rupiah" value="@rupiah(old('harga', $item->harga))" required>
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah">Jumlah Barang</label>
                                <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Masukkan Jumlah Barang" value="{{ old('jumlah', $item->jumlah) }}" required>
                                @error('jumlah')
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
                                <label for="kondisi_baik">Jumlah Barang Kondisi Baik</label>
                                <input type="number" name="kondisi_baik" class="form-control @error('kondisi_baik') is-invalid @enderror" id="kondisi_baik" placeholder="Masukkan Jumlah Barang Kondisi Baik" value="{{ old('kondisi_baik', $item->kondisi_baik) }}">
                                @error('kondisi_baik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kondisi_tidak_baik">Jumlah Barang Kondisi Tidak Baik</label>
                                <input type="number" name="kondisi_tidak_baik" class="form-control @error('kondisi_tidak_baik') is-invalid @enderror" id="kondisi_tidak_baik" placeholder="Masukkan Jumlah Barang Kondisi Tidak Baik" value="{{ old('kondisi_tidak_baik', $item->kondisi_tidak_baik) }}">
                                @error('kondisi_tidak_baik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kondisi_rusak">Jumlah Barang Kondisi Rusak</label>
                                <input type="number" name="kondisi_rusak" class="form-control @error('kondisi_rusak') is-invalid @enderror" id="kondisi_rusak" placeholder="Masukkan Jumlah Barang Kondisi Rusak" value="{{ old('kondisi_rusak', $item->kondisi_rusak) }}">
                                @error('kondisi_rusak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukkan Keterangan" value="{{ old('keterangan', $item->keterangan) }}">
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('data-inventaris.detail', $item->ruangan_id) }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
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
