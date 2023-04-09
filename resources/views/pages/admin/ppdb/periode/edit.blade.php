@extends('layouts.admin')

@section('title', 'Data Periode')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('periode.index') }}" class="btn btn-rounded btn-primary mb-3">Kembali ke Halaman Periode</a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Periode</h4>
                <form class="forms-sample" action="{{ route('periode.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="periode" placeholder="Masukkan Periode" value="{{ old('periode', $item->periode) }}" required>
                                @error('periode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="buka">Status</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="buka"
                                            value="buka" @if (old('status', $item->status) == 'buka') checked @endif required>
                                        Buka
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="tutup"
                                            value="tutup" @if (old('status', $item->status) == 'tutup') checked @endif required>
                                        Tutup
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    {{-- <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    @if(session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session()->get("error") }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif --}}
@endpush
