<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnak extends Model
{
    use HasFactory;

    public $table = 'data_anak';

    protected $fillable = [
        'pendaftaran_id', 'nama', 'hobi', 'panggilan', 'agama', 'jumlah_saudara', 'tempat_lahir', 'tanggal_lahir', 'asal_sekolah', 'status_keluarga', 'jenis_kelamin', 'suku', 'anak_ke', 'alamat', 'cita_cita'
    ];

    public function pendaftaran()
    {
        return $this->hasOne(PendaftaranPPDB::class, 'id', 'pendaftaran_id');
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'anak_id', 'id');
    }

    public function penyakit()
    {
        return $this->hasMany(RiwayatPenyakit::class, 'anak_id', 'id');
    }

    public function treatment()
    {
        return $this->hasMany(Treatment::class, 'anak_id', 'id');
    }
}
