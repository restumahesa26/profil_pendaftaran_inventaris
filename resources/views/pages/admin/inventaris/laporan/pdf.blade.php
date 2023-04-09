<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Inventaris</title>
    <link rel="shortcut icon" href="{{ url('backend/images/logo.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        @media print{
            @page {
                size: landscape
            }
        }

        body {
            font-family: 'Times New Roman';
        }

        h5 {
            font-size: 16px;
        }

        h4 {
            font-size: 20px;
        }

        table tr th, table tr td {
            font-size: 12px;
        }

        .table-bordered tr td {
            padding: 8px !important;
        }

        .table-bordered th, .table-bordered td{
            border: 1px solid #2C3333 !important;
        }
    </style>
</head>
<body>
    <h4 class="text-center font-weight-bold">Inventaris {{ $item->nama_ruangan }}</h4>
    <table id="table" class="table table-bordered mt-3">
        <thead>
            <tr class="text-center">
                <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                <th rowspan="2" style="vertical-align : middle;text-align:center;">Nama Barang
                </th>
                <th rowspan="2" style="vertical-align : middle;text-align:center;">Jumlah Barang
                </th>
                <th rowspan="2" style="vertical-align : middle;text-align:center;">Harga</th>
                <th colspan="3">Keadaan Barang</th>
                <th rowspan="2" style="vertical-align : middle;text-align:center;">Keterangan</th>
            </tr>
            <tr class="text-center">
                <th style=" vertical-align : middle;text-align:center;">Baik</th>
                <th style="">Tidak Baik</th>
                <th style="">Rusak</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($item->inventaris as $item2)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item2->barang->nama_barang }}</td>
                <td>{{ $item2->jumlah }}</td>
                <td>@rupiah($item2->harga)</td>
                <td>{{ $item2->keadaan_baik != '' ? $item2->keadaan_baik : '-' }}</td>
                <td>{{ $item2->keadaan_kurang_baik != '' ? $item2->keadaan_tidak_baik : '-' }}
                </td>
                <td>{{ $item2->rusak_berat != '' ? $item2->rusak : '-' }}</td>
                <td>{{ $item2->keterangan != '' ? $item2->keterangan : '-' }}</td>
            </tr>
            @empty
            <tr class="text-center">
                <td colspan="9">-- Data Kosong --</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
    window.print()
</script>
</html>
