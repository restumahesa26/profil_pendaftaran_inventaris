<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPPDB extends Model
{
    use HasFactory;

    public $table = 'pendaftaran_ppdb';

    protected $fillable = [
        'periode_id', 'wali_murid_id', 'status', 'tanggal_tes', 'waktu_tes', 'ruang_tes', 'status_tes'
    ];

    public function periode()
    {
        return $this->hasOne(Periode::class, 'id', 'periode_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(PembayaranPPDB::class, 'pendaftaran_id', 'id');
    }

    public function wali_murid()
    {
        return $this->hasOne(User::class, 'id', 'wali_murid_id');
    }

    public function checkDataAnak($id)
    {
        $check = DataAnak::where('pendaftaran_id', $id)->first();

        if ($check == NULL) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDataAyah($id)
    {
        $check = DataAyah::where('pendaftaran_id', $id)->first();

        if ($check == NULL) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDataIbu($id)
    {
        $check = DataIbu::where('pendaftaran_id', $id)->first();

        if ($check == NULL) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDataTambahan($id)
    {
        $check = DataTambahan::where('pendaftaran_id', $id)->first();

        if ($check == NULL) {
            return true;
        } else {
            return false;
        }
    }

    public function checkBerkas($id)
    {
        $check = BerkasPendaftaran::where('pendaftaran_id', $id)->first();

        if ($check == NULL) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPembayaran($id)
    {
        $check = PembayaranPPDB::where('pendaftaran_id', $id)->first();

        if ($check == NULL) {
            return true;
        } else {
            return false;
        }
    }
}
