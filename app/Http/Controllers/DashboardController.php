<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataAnak;
use App\Models\FotoKegiatan;
use App\Models\GuruStaf;
use App\Models\PembayaranPPDB;
use App\Models\PendaftaranPPDB;
use App\Models\Periode;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $periode = Periode::where('status', 'buka')->first();
        $guru = GuruStaf::count();
        $foto = FotoKegiatan::count();
        $anak = DataAnak::count();
        if ($periode) {
            $pendaftaran = PendaftaranPPDB::where('periode_id', $periode->id)->where('status_tes', 'lulus')->count();
            $pembayaran = PembayaranPPDB::join('pendaftaran_ppdb as pendaftaran', 'pendaftaran.id', '=', 'pembayaran_ppdb.pendaftaran_id')->where('pendaftaran.periode_id', $periode->id)->where('pembayaran_ppdb.status', 'terima')->count();
        }else {
            $pendaftaran = '';
            $pembayaran = '';
        }

        return view('pages.dashboard', compact('periode', 'guru', 'foto', 'anak', 'pendaftaran', 'pembayaran'));
    }
}
