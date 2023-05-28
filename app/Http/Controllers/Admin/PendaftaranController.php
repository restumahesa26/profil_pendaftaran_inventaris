<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\BerkasPendaftaran;
use App\Models\DataAnak;
use App\Models\DataAyah;
use App\Models\DataIbu;
use App\Models\DataTambahan;
use App\Models\PendaftaranPPDB;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    public function index()
    {
        $periode = Periode::where('status', 'buka')->first();

        if ($periode) {
            $items = PendaftaranPPDB::withCount('pembayarans')->where('periode_id', $periode->id)->latest()->get();

            return view('pages.admin.ppdb.pendaftaran.index', compact('items'));
        } else {
            Alert::toast('Tidak Ada Periode Aktif', 'info')->position('top');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $item = PendaftaranPPDB::findOrFail($id);
        $anak = DataAnak::where('pendaftaran_id', $id)->first();
        $ayah = DataAyah::where('pendaftaran_id', $id)->first();
        $ibu = DataIbu::where('pendaftaran_id', $id)->first();
        $tambahan = DataTambahan::where('pendaftaran_id', $id)->first();
        $berkas = BerkasPendaftaran::where('pendaftaran_id', $id)->first();

        return view('pages.admin.ppdb.pendaftaran.show', compact('item', 'anak', 'ayah', 'ibu', 'tambahan', 'berkas'));
    }

    public function update_data_anak(Request $request, $id)
    {
        $item = DataAnak::where('pendaftaran_id', $id)->first();

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

        $item->update([
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

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Anak');

        Alert::toast('Berhasil Simpan Perubahan Data Anak', 'success')->position('top');
        return redirect()->route('admin-pendaftaran.show', $item->pendaftaran->id);
    }

    public function update_data_ayah(Request $request, $id)
    {
        $item = DataAyah::where('pendaftaran_id', $id)->first();

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

        $item->update([
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

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Ayah');

        Alert::toast('Berhasil Simpan Perubahan Data Ayah', 'success')->position('top');
        return redirect()->route('admin-pendaftaran.show', $item->pendaftaran->id);
    }

    public function update_data_ibu(Request $request, $id)
    {
        $item = DataIbu::where('pendaftaran_id', $id)->first();

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

        $item->update([
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

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Ibu');

        Alert::toast('Berhasil Simpan Perubahan Data Ibu', 'success')->position('top');
        return redirect()->route('admin-pendaftaran.show', $item->pendaftaran->id);
    }

    public function update_data_tambahan(Request $request, $id)
    {
        $item = DataTambahan::where('pendaftaran_id', $id)->first();

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

        $item->update([
            'kebiasaan_anak' => $request->kebiasaan_anak,
            'pola_asuh' => $request->pola_asuh,
            'pantangan' => $request->pantangan,
            'karakter_anak' => $request->karakter_anak,
            'alasan' => $request->alasan,
            'harapan_ortu' => $request->harapan_ortu,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Tambahan');

        Alert::toast('Berhasil Simpan Perubahan Data Tambahan', 'success')->position('top');
        return redirect()->route('admin-pendaftaran.show', $item->pendaftaran->id);
    }

    public function verifikasi($id)
    {
        $item = PendaftaranPPDB::findOrFail($id);

        $item->status = 'verifikasi';
        $item->save();

        ActivityLog::createViewLog(Auth::user()->id, 'Memverifikasi Data Pendaftaran PPDB');

        Alert::toast('Berhasil Verifikasi Pendaftaran', 'success')->position('top');
        return redirect()->route('admin-pendaftaran.index');
    }

    public function store_jadwal_tes(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_tes' => 'required|date',
            'waktu_tes' => 'required|date_format:H:i',
            'ruang_tes' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = PendaftaranPPDB::findOrFail($id);

        $item->update([
            'tanggal_tes' => $request->tanggal_tes,
            'waktu_tes' => $request->waktu_tes,
            'ruang_tes' => $request->ruang_tes,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Jadwal Tes PPDB');

        Alert::toast('Berhasil Simpan Jadwal Tes', 'success')->position('top');
        return redirect()->route('admin-pendaftaran.show', $id);
    }

    public function store_hasil_tes(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status_tes' => 'required|in:lulus,tidak-lulus',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = PendaftaranPPDB::findOrFail($id);

        $item->update([
            'status_tes' => $request->status_tes,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Hasil Tes PPDB');

        Alert::toast('Berhasil Simpan Status Hasil Tes', 'success')->position('top');
        return redirect()->route('admin-pendaftaran.show', $id);
    }

    public function delete($id)
    {
        $item = PendaftaranPPDB::findOrFail($id);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Pendaftaran PPDB');

        Alert::toast('Berhasil Hapus Data Pendaftaran', 'success')->position('top');
        return redirect()->route('admin-pendaftaran.index');
    }
}
