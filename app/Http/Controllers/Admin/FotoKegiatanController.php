<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\FotoKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FotoKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = FotoKegiatan::latest()->get();

        return view('pages.admin.profil-sekolah.foto-kegiatan.index', compact('items'));
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
            'gambar' => ['required', 'mimes:png,jpg,jpeg'],
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extension = $request->file('gambar')->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('gambar')->move(public_path('images/gambar-foto-kegiatan'), $imageNames);
        // $thumbnailpath = public_path('images/gambar-foto-kegiatan/' . $imageNames);
        // Image::make($thumbnailpath)->resize(1200, 1200)->save($thumbnailpath);

        FotoKegiatan::create([
            'gambar' => $imageNames,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Foto Kegiatan');

        Alert::toast('Berhasil Simpan Data', 'success')->position('top');
        return redirect()->route('foto-kegiatan.index');
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
            'gambar' => ['nullable', 'mimes:png,jpg,jpeg'],
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $id);
        }

        $item = FotoKegiatan::findOrFail($id);

        if ($request->gambar) {
            $extension = $request->file('gambar')->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            $request->file('gambar')->move(public_path('images/gambar-foto-kegiatan'), $imageNames);
            // $thumbnailpath = public_path('images/gambar-foto-kegiatan/' . $imageNames);
            // Image::make($thumbnailpath)->resize(1200, 1200)->save($thumbnailpath);
        }else {
            $imageNames = $item->gambar;
        }

        $item->update([
            'gambar' => $imageNames,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Foto Kegiatan');

        Alert::toast('Berhasil Simpan Perubahan Data', 'success')->position('top');
        return redirect()->route('foto-kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = FotoKegiatan::findOrFail($id);

        $filename  = ('public/images/gambar-foto-kegiatan/').$item->gambar;
        Storage::delete($filename);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Foto Kegiatan');

        Alert::toast('Berhasil Hapus Data', 'success')->position('top');
        return redirect()->route('foto-kegiatan.index');
    }
}
