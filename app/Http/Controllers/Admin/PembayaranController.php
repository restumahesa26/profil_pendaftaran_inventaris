<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\PembayaranPPDB;
use App\Models\PendaftaranPPDB;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function index()
    {
        $periode = Periode::where('status', 'buka')->first();

        if ($periode) {
            $items = PendaftaranPPDB::where('periode_id', $periode->id)->where('status_tes', 'lulus')->latest()->get();

            return view('pages.admin.ppdb.pembayaran.index', compact('items'));
        } else {
            Alert::toast('Tidak Ada Periode Aktif', 'info')->position('top');
            return redirect()->back();
        }
    }

    public function verifikasi($id)
    {
        $item = PembayaranPPDB::findOrFail($id);

        $item->status = 'terima';
        $item->save();

        ActivityLog::createViewLog(Auth::user()->id, 'Memverifikasi Pembayaran PPDB');

        Alert::toast('Berhasil Verifikasi Pembayaran', 'success')->position('top');
        return redirect()->route('admin-pembayaran.index');
    }

    public function tolak($id)
    {
        $item = PembayaranPPDB::findOrFail($id);

        $filename  = ('public/images/bukti-pembayaran/').$item->bukti_pembayaran;
        Storage::delete($filename);

        $item->status = 'tolak';
        $item->bukti_pembayaran = '';
        $item->save();

        ActivityLog::createViewLog(Auth::user()->id, 'Menolak Pembayaran PPDB');

        Alert::toast('Berhasil Tolak Pembayaran', 'success')->position('top');
        return redirect()->route('admin-pembayaran.index');
    }
}
