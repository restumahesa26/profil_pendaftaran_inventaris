<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\DataBarang;
use App\Models\DataRuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DataRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DataRuangan::withCount('inventaris')->latest()->get();
        $items2 = DataBarang::all();

        return view('pages.admin.inventaris.data-ruangan.index', compact('items', 'items2'));
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
            'nama_ruangan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DataRuangan::create([
            'nama_ruangan' => $request->nama_ruangan
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Ruangan');

        Alert::toast('Berhasil Simpan Data Ruangan', 'success')->position('top');
        return redirect()->route('data-ruangan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruangan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $id);
        }

        $item = DataRuangan::findOrFail($id);

        $item->update([
            'nama_ruangan' => $request->nama_ruangan
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Ruangan');

        Alert::toast('Berhasil Simpan Perubahan Data Ruangan', 'success')->position('top');
        return redirect()->route('data-ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = DataRuangan::findOrFail($id);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Ruangan');

        Alert::toast('Berhasil Hapus Data Ruangan', 'success')->position('top');
        return redirect()->route('data-ruangan.index');
    }
}
