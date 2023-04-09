<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FotoKegiatan;
use App\Models\GuruStaf;
use App\Models\StrukturOrganisasi;
use App\Models\VisiMisiTujuan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $guru = GuruStaf::all();
        $struktur = StrukturOrganisasi::first();
        $visi = VisiMisiTujuan::where('jenis', 'visi')->first();
        $misi = VisiMisiTujuan::where('jenis', 'misi')->first();
        $tujuan = VisiMisiTujuan::where('jenis', 'tujuan')->first();
        $foto = FotoKegiatan::all();

        return view('pages.user.home', compact('guru', 'struktur', 'visi', 'misi', 'tujuan', 'foto'));
    }
}
