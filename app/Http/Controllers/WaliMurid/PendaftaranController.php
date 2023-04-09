<?php

namespace App\Http\Controllers\WaliMurid;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\BerkasPendaftaran;
use App\Models\DataAnak;
use App\Models\DataAyah;
use App\Models\DataIbu;
use App\Models\DataTambahan;
use App\Models\PendaftaranPPDB;
use App\Models\Periode;
use App\Models\Prestasi;
use App\Models\RiwayatPenyakit;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    public function index()
    {
        $items = PendaftaranPPDB::where('wali_murid_id', Auth::user()->id)->get();

        return view('pages.wali-murid.pendaftaran.index', compact('items'));
    }

    public function create()
    {
        $check = Periode::where('status', 'buka')->first();

        if ($check == NULL) {
            Alert::toast('Gagal, Periode Pendaftaran Tutup', 'error')->position('top');
            return back();
        }

        $check2 = PendaftaranPPDB::where('wali_murid_id', Auth::user()->id)->where('status', 'tunggu')->orWhere('status', 'tolak')->first();

        if ($check2 != NULL) {
            Alert::toast('Gagal, Data Masih Ada Yang Belum Diverifikasi', 'error')->position('top');
            return back();
        }

        PendaftaranPPDB::create([
            'periode_id' => $check->id,
            'wali_murid_id' => Auth::user()->id,
            'status' => 'tunggu',
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Pendaftaran PPDB');

        Alert::toast('Berhasil Tambah Pendaftaran', 'success')->position('top');
        return redirect()->route('pendaftaran.index');
    }

    public function data_anak(string $id)
    {
        $item = DataAnak::where('pendaftaran_id', $id)->first();

        if ($item == NULL) {
            $status = true;
            return view('pages.wali-murid.pendaftaran.data-anak', compact('status', 'id'));
        } else {
            $status = false;
            return view('pages.wali-murid.pendaftaran.data-anak', compact('item', 'status', 'id'));
        }
    }

    public function store_data_anak(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'panggilan' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'hobi' => 'nullable|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'suku' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:255',
            'cita_cita' => 'nullable|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jumlah_saudara' => 'required|integer',
            'anak_ke' => 'required|integer',
            'status_keluarga' => 'required|in:anak-kandung,anak-angkat',
            'jenis_kelamin' => 'required|in:l,p',
            'agama' => 'required|in:islam,katolik,protestan,hindu,buddha,konghucu',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $anak = DataAnak::create([
            'pendaftaran_id' => $id,
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'tempat_lahir' => $request->tempat_lahir,
            'hobi' => $request->hobi,
            'agama' => $request->agama,
            'asal_sekolah' => $request->asal_sekolah,
            'suku' => $request->suku,
            'alamat' => $request->alamat,
            'cita_cita' => $request->cita_cita,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jumlah_saudara' => $request->jumlah_saudara,
            'anak_ke' => $request->anak_ke,
            'status_keluarga' => $request->status_keluarga,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
        ]);

        if ($request->prestasi) {
            foreach ($request->prestasi as $prestasi) {
                Prestasi::create([
                    'anak_id' => $anak->id,
                    'nama_prestasi' => $prestasi
                ]);
            }
        }

        if ($request->penyakit) {
            foreach ($request->penyakit as $penyakit) {
                RiwayatPenyakit::create([
                    'anak_id' => $anak->id,
                    'nama_penyakit' => $penyakit
                ]);
            }
        }

        if ($request->treatment) {
            foreach ($request->treatment as $treatment) {
                Treatment::create([
                    'anak_id' => $anak->id,
                    'nama_treatment' => $treatment
                ]);
            }
        }

        ActivityLog::createViewLog(Auth::user()->id, 'Melengkapi Data Anak');

        Alert::toast('Berhasil Lengkapi Data Anak', 'success')->position('top');
        return redirect()->route('pendaftaran.data-anak', $id);
    }

    public function data_ayah(string $id)
    {
        $item = DataAyah::where('pendaftaran_id', $id)->first();

        if ($item == NULL) {
            $status = true;
            return view('pages.wali-murid.pendaftaran.data-ayah', compact('status', 'id'));
        } else {
            $status = false;
            return view('pages.wali-murid.pendaftaran.data-ayah', compact('item', 'status', 'id'));
        }
    }

    public function store_data_ayah(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'panggilan' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'suku' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'no_hp' => 'required|numeric',
            'jumlah_anak' => 'required|integer',
            'penghasilan' => 'required',
            'tanggal_lahir' => 'required|date',
            'status_nikah' => 'required|in:kawin-tercatat,kawin-belum-tercatat,cerai-hidup,cerai-mati',
            'agama' => 'required|in:islam,katolik,protestan,hindu,buddha,konghucu',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penghasilan = str_replace( array('Rp','.',','),'', $request->penghasilan);

        DataAyah::create([
            'pendaftaran_id' => $id,
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'no_hp' => $request->no_hp,
            'tempat_lahir' => $request->tempat_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'agama' => $request->agama,
            'jumlah_anak' => $request->jumlah_anak,
            'suku' => $request->suku,
            'alamat' => $request->alamat,
            'penghasilan' => $penghasilan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_nikah' => $request->status_nikah,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Melengkapi Data Ayah');

        Alert::toast('Berhasil Lengkapi Data Ayah', 'success')->position('top');
        return redirect()->route('pendaftaran.data-ayah', $id);
    }

    public function data_ibu(string $id)
    {
        $item = DataIbu::where('pendaftaran_id', $id)->first();

        if ($item == NULL) {
            $status = true;
            return view('pages.wali-murid.pendaftaran.data-ibu', compact('status', 'id'));
        } else {
            $status = false;
            return view('pages.wali-murid.pendaftaran.data-ibu', compact('item', 'status', 'id'));
        }
    }

    public function store_data_ibu(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'panggilan' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'suku' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'no_hp' => 'required|numeric',
            'jumlah_anak' => 'required|integer',
            'penghasilan' => 'required',
            'tanggal_lahir' => 'required|date',
            'status_nikah' => 'required|in:kawin-tercatat,kawin-belum-tercatat,cerai-hidup,cerai-mati',
            'agama' => 'required|in:islam,katolik,protestan,hindu,buddha,konghucu',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penghasilan = str_replace( array('Rp','.',','),'', $request->penghasilan);

        DataIbu::create([
            'pendaftaran_id' => $id,
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'no_hp' => $request->no_hp,
            'tempat_lahir' => $request->tempat_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'agama' => $request->agama,
            'jumlah_anak' => $request->jumlah_anak,
            'suku' => $request->suku,
            'alamat' => $request->alamat,
            'penghasilan' => $penghasilan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_nikah' => $request->status_nikah,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Melengkapi Data Ibu');

        Alert::toast('Berhasil Lengkapi Data Ibu', 'success')->position('top');
        return redirect()->route('pendaftaran.data-ibu', $id);
    }

    public function data_tambahan(string $id)
    {
        $item = DataTambahan::where('pendaftaran_id', $id)->first();

        if ($item == NULL) {
            $status = true;
            return view('pages.wali-murid.pendaftaran.data-tambahan', compact('status', 'id'));
        } else {
            $status = false;
            return view('pages.wali-murid.pendaftaran.data-tambahan', compact('item', 'status', 'id'));
        }
    }

    public function store_data_tambahan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kebiasaan_anak' => 'required|string|max:255',
            'pola_asuh' => 'required|string|max:255',
            'pantangan' => 'required|string|max:255',
            'karakter_anak' => 'required|string|max:255',
            'alasan' => 'nullable|string|max:255',
            'harapan_ortu' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DataTambahan::create([
            'pendaftaran_id' => $id,
            'kebiasaan_anak' => $request->kebiasaan_anak,
            'pola_asuh' => $request->pola_asuh,
            'pantangan' => $request->pantangan,
            'karakter_anak' => $request->karakter_anak,
            'alasan' => $request->alasan,
            'harapan_ortu' => $request->harapan_ortu,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Melengkapi Data Tambahan');

        Alert::toast('Berhasil Lengkapi Data Tambahan', 'success')->position('top');
        return redirect()->route('pendaftaran.data-tambahan', $id);
    }

    public function berkas(string $id)
    {
        $item = BerkasPendaftaran::where('pendaftaran_id', $id)->first();

        if ($item == NULL) {
            $status = true;
            return view('pages.wali-murid.pendaftaran.berkas', compact('status', 'id'));
        } else {
            $status = false;
            return view('pages.wali-murid.pendaftaran.berkas', compact('item', 'status', 'id'));
        }
    }

    public function store_berkas(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kartu_keluarga' => 'required|mimes:jpg,png,jpeg',
            'ktp' => 'required|mimes:jpg,png,jpeg',
            'akta_kelahiran' => 'required|mimes:jpg,png,jpeg',
            'print_nisn' => 'required|mimes:jpg,png,jpeg',
            'pas_foto' => 'required|mimes:jpg,png,jpeg',
            'ijazah' => 'required|mimes:jpg,png,jpeg',
            'skhun' => 'required|mimes:jpg,png,jpeg',
            'identitas_raport' => 'required|mimes:jpg,png,jpeg',
            'skbb' => 'required|mimes:jpg,png,jpeg',
            'kartu' => 'required|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // kartu keluarga
        $extension = $request->file('kartu_keluarga')->extension();
        $kartu_keluarga = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('kartu_keluarga')->move(public_path('images/berkas/kartu-keluarga'), $kartu_keluarga);

        // ktp
        $extension = $request->file('ktp')->extension();
        $ktp = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('ktp')->move(public_path('images/berkas/ktp'), $ktp);

        // akta kelahiran
        $extension = $request->file('akta_kelahiran')->extension();
        $akta_kelahiran = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('akta_kelahiran')->move(public_path('images/berkas/akta-kelahiran'), $akta_kelahiran);

        // print nisn
        $extension = $request->file('print_nisn')->extension();
        $print_nisn = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('print_nisn')->move(public_path('images/berkas/print-nisn'), $print_nisn);

        // pas foto
        $extension = $request->file('pas_foto')->extension();
        $pas_foto = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('pas_foto')->move(public_path('images/berkas/pas-foto'), $pas_foto);

        // ijazah
        $extension = $request->file('ijazah')->extension();
        $ijazah = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('ijazah')->move(public_path('images/berkas/ijazah'), $ijazah);

        // skhun
        $extension = $request->file('skhun')->extension();
        $skhun = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('skhun')->move(public_path('images/berkas/skhun'), $skhun);

        // identitas raport
        $extension = $request->file('identitas_raport')->extension();
        $identitas_raport = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('identitas_raport')->move(public_path('images/berkas/identitas-raport'), $identitas_raport);

        // skbb
        $extension = $request->file('skbb')->extension();
        $skbb = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('skbb')->move(public_path('images/berkas/kartu-keluarga'), $skbb);

        // kartu
        $extension = $request->file('kartu')->extension();
        $kartu = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('kartu')->move(public_path('images/berkas/kartu'), $kartu);

        BerkasPendaftaran::create([
            'pendaftaran_id' => $id,
            'kartu_keluarga' => $kartu_keluarga,
            'ktp' => $ktp,
            'akta_kelahiran' => $akta_kelahiran,
            'print_nisn' => $print_nisn,
            'pas_foto' => $pas_foto,
            'ijazah' => $ijazah,
            'skhun' => $skhun,
            'identitas_raport' => $identitas_raport,
            'skbb' => $skbb,
            'kartu' => $kartu,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Melengkapi Berkas Pendaftaran');

        Alert::toast('Berhasil Lengkapi Berkas Pendaftaran', 'success')->position('top');
        return redirect()->route('pendaftaran.berkas', $id);
    }
}
