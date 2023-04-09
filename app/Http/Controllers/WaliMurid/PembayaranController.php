<?php

namespace App\Http\Controllers\WaliMurid;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\PembayaranPPDB;
use App\Models\PendaftaranPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function index()
    {
        $items = PendaftaranPPDB::where('wali_murid_id', Auth::user()->id)->where('status_tes', 'lulus')->get();

        return view('pages.wali-murid.pembayaran.index', compact('items'));
    }

    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extension = $request->file('bukti_pembayaran')->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('bukti_pembayaran')->move(public_path('images/bukti-pembayaran'), $imageNames);

        PembayaranPPDB::create([
            'pendaftaran_id' => $id,
            'status' => 'tunggu',
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'bukti_pembayaran' => $imageNames,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Melakukan Pembayaran PPDB');

        Alert::toast('Berhasil Melakukan Pembayaran', 'success')->position('top');
        return redirect()->route('pembayaran.index');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = PembayaranPPDB::where('pendaftaran_id', $id)->first();

        $extension = $request->file('bukti_pembayaran')->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('bukti_pembayaran')->move(public_path('images/bukti-pembayaran'), $imageNames);

        $item->update([
            'status' => 'tunggu',
            'bukti_pembayaran' => $imageNames,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Melakukan Ulang Pembayaran PPDB');

        Alert::toast('Berhasil Melakukan Ulang Pembayaran', 'success')->position('top');
        return redirect()->route('pembayaran.index');
    }
}
