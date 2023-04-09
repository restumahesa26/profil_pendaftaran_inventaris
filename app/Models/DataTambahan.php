<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTambahan extends Model
{
    use HasFactory;

    public $table = 'data_tambahan';

    protected $fillable = [
        'pendaftaran_id', 'kebiasaan_anak', 'pola_asuh', 'pantangan', 'karakter_anak', 'alasan', 'tempat_lahir', 'harapan_ortu'
    ];

    public function pendaftaran()
    {
        return $this->hasOne(PendaftaranPPDB::class, 'id', 'pendaftaran_id');
    }
}
