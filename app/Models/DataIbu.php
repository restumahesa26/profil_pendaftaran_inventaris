<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataIbu extends Model
{
    use HasFactory;

    public $table = 'data_ibu';

    protected $fillable = [
        'pendaftaran_id', 'nama', 'no_hp', 'panggilan', 'agama', 'pendidikan_terakhir', 'tempat_lahir', 'tanggal_lahir', 'status_nikah', 'jumlah_anak', 'pekerjaan', 'suku', 'penghasilan', 'alamat', 'status_nikah'
    ];

    public function pendaftaran()
    {
        return $this->hasOne(PendaftaranPPDB::class, 'id', 'pendaftaran_id');
    }
}
