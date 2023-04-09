<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\DataBarang;
use App\Models\DataInventaris;
use App\Models\DataRuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DataInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DataRuangan::latest()->get();

        return view('pages.admin.inventaris.data-inventaris.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric',
            'harga' => 'required',
            'kondisi_baik' => 'nullable|numeric',
            'kondisi_tidak_baik' => 'nullable|numeric',
            'kondisi_rusak' => 'nullable|numeric',
            'keterangan' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $harga = str_replace( array('Rp','.',','),'', $request->harga);

        DataInventaris::create([
            'ruangan_id' => $request->ruangan_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'harga' => $harga,
            'kondisi_baik' => $request->kondisi_baik,
            'kondisi_tidak_baik' => $request->kondisi_tidak_baik,
            'kondisi_rusak' => $request->kondisi_rusak,
            'keterangan' => $request->keterangan,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Inventaris');

        Alert::toast('Berhasil Simpan Data Inventaris', 'success')->position('top');
        return redirect()->route('data-inventaris.index');
    }

    /**
     * Display the specified resource.
     */
    public function detail(string $id)
    {
        $items = DataInventaris::where('ruangan_id', $id)->get();

        return view('pages.admin.inventaris.data-inventaris.show', compact('items'));
    }

    public function show(string $id)
    {
        $item = DataRuangan::findOrFail($id);
        $items = DataBarang::all();

        return view('pages.admin.inventaris.data-inventaris.create', compact('item', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = DataInventaris::findOrFail($id);
        $items = DataBarang::all();

        return view('pages.admin.inventaris.data-inventaris.edit', compact('item', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric',
            'harga' => 'required',
            'kondisi_baik' => 'nullable|numeric',
            'kondisi_tidak_baik' => 'nullable|numeric',
            'kondisi_rusak' => 'nullable|numeric',
            'keterangan' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $harga = str_replace( array('Rp','.',','),'', $request->harga);

        $item = DataInventaris::findOrFail($id);

        $item->update([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'harga' => $harga,
            'kondisi_baik' => $request->kondisi_baik,
            'kondisi_tidak_baik' => $request->kondisi_tidak_baik,
            'kondisi_rusak' => $request->kondisi_rusak,
            'keterangan' => $request->keterangan,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Inventaris');

        Alert::toast('Berhasil Simpan Perubahan Data Inventaris', 'success')->position('top');
        return redirect()->route('data-inventaris.detail', $item->ruangan_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = DataInventaris::findOrFail($id);

        $ruangan_id = $item->ruangan_id;

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Inventaris');

        Alert::toast('Berhasil Hapus Data Inventaris', 'success')->position('top');

        $count = DataInventaris::where('ruangan_id', $ruangan_id)->count();
        if ($count > 0) {
            return redirect()->route('data-inventaris.detail', $ruangan_id);
        } else {
            return redirect()->route('data-inventaris.index');
        }
    }
}
