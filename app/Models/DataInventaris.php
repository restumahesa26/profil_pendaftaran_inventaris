<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInventaris extends Model
{
    use HasFactory;

    public $table = 'data_inventaris';

    protected $fillable = [
        'ruangan_id', 'barang_id', 'harga', 'jumlah', 'kondisi_baik', 'kondisi_tidak_baik', 'kondisi_rusak', 'keterangan'
    ];

    public function ruangan()
    {
        return $this->hasOne(DataRuangan::class, 'id', 'ruangan_id');
    }

    public function barang()
    {
        return $this->hasOne(DataBarang::class, 'id', 'barang_id');
    }
}
