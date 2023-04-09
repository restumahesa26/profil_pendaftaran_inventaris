<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DataBarang::latest()->get();

        return view('pages.admin.inventaris.data-barang.index', compact('items'));
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
            'nama_barang' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DataBarang::create([
            'nama_barang' => $request->nama_barang
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Barang');

        Alert::toast('Berhasil Simpan Data Barang', 'success')->position('top');
        return redirect()->route('data-barang.index');
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
            'nama_barang' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $id);
        }

        $item = DataBarang::findOrFail($id);

        $item->update([
            'nama_barang' => $request->nama_barang
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Barang');

        Alert::toast('Berhasil Simpan Perubahan Data Barang', 'success')->position('top');
        return redirect()->route('data-barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = DataBarang::findOrFail($id);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Barang');

        Alert::toast('Berhasil Hapus Data Barang', 'success')->position('top');
        return redirect()->route('data-barang.index');
    }
}
