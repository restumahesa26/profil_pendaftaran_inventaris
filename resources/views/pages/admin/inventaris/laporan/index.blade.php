@extends('layouts.admin')

@section('title', 'Data Ruangan')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cetak Laporan Inventaris</h4>
                <form action="{{ route('laporan.pdf') }}" method="get" target="_blank">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ruangan_id">Nama Ruangan</label>
                                <select name="ruangan_id" id="ruangan_id" class="form-control" required>
                                    <option value="" hidden>--Pilih Nama Ruangan--</option>
                                    @forelse ($items as $item)
                                        <option value="{{ $item->id }}" @if(old('ruangan_id') == $item->id) selected @endif>{{ $item->nama_ruangan }}</option>
                                    @empty

                                    @endforelse
                                </select>
                                @error('ruangan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
    @if ($items->count() > 0)
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_wrapper .dataTable .btn, .dataTables_wrapper .dataTable .ajax-upload-dragdrop .ajax-file-upload, .ajax-upload-dragdrop .dataTables_wrapper .dataTable .ajax-file-upload, .dataTables_wrapper .dataTable .swal2-modal .swal2-buttonswrapper .swal2-styled, .swal2-modal .swal2-buttonswrapper .dataTables_wrapper .dataTable .swal2-styled {
            padding: 8px 13px;
            vertical-align: top;
        }
    </style>
    @endif
@endpush

@push('addon-script')
    <script src="{{ url('sweetalert2.all.min.js') }}"></script>
    @if ($items->count() > 0)
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" defer></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "orderable" : false,
            });
        });
    </script>
    @endif
@endpush
