<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPendaftaran extends Model
{
    use HasFactory;

    public $table = 'berkas_pendaftaran';

    protected $fillable = [
        'pendaftaran_id', 'kartu_keluarga', 'ktp', 'akta_kelahiran', 'print_nisn', 'pas_foto', 'ijazah', 'skhun', 'identitas_raport', 'skbb', 'kartu'
    ];

    public function pendaftaran()
    {
        return $this->hasOne(PendaftaranPPDB::class, 'id', 'pendaftaran_id');
    }
}
