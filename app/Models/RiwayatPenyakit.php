<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    use HasFactory;

    public $table = 'riwayat_penyakit';

    protected $fillable = [
        'anak_id', 'nama_penyakit'
    ];

    public function anak()
    {
        return $this->hasOne(DataAnak::class, 'id', 'anak_id');
    }
}
