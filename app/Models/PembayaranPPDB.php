<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPPDB extends Model
{
    use HasFactory;

    public $table = 'pembayaran_ppdb';

    protected $fillable = [
        'pendaftaran_id', 'bukti_pembayaran', 'status'
    ];

    public function pendaftaran()
    {
        return $this->hasOne(PendaftaranPPDB::class, 'id', 'pendaftaran_id');
    }
}
