<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = StrukturOrganisasi::all();

        return view('pages.admin.profil-sekolah.struktur-organisasi.index', compact('items'));
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
            'struktur_organisasi' => ['required', 'mimes:png,jpg,jpeg'],
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $check = StrukturOrganisasi::first();

        if ($check == NULL) {
            $extension = $request->file('struktur_organisasi')->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            $request->file('struktur_organisasi')->move(public_path('images/struktur-organisasi'), $imageNames);

            StrukturOrganisasi::create([
                'struktur_organisasi' => $imageNames,
            ]);
        } else {
            Alert::toast('Gagal, Data Sudah Ada', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Struktur Organisasi');

        Alert::toast('Berhasil Simpan Data', 'success')->position('top');
        return redirect()->route('struktur-organisasi.index');
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
            'struktur_organisasi' => ['required', 'mimes:png,jpg,jpeg'],
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $id);
        }

        $item = StrukturOrganisasi::findOrFail($id);

        $extension = $request->file('struktur_organisasi')->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('struktur_organisasi')->move(public_path('images/struktur-organisasi'), $imageNames);

        $filename  = ('public/images/struktur-organisasi/').$item->struktur_organisasi;
        Storage::delete($filename);

        $item->update([
            'struktur_organisasi' => $imageNames,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Struktur Organisasi');

        Alert::toast('Berhasil Simpan Data', 'success')->position('top');
        return redirect()->route('struktur-organisasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = StrukturOrganisasi::findOrFail($id);

        $filename  = ('public/images/struktur-organisasi/').$item->struktur_organisasi;
        Storage::delete($filename);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Struktur Organisasi');

        Alert::toast('Berhasil Hapus Data', 'success')->position('top');
        return redirect()->route('struktur-organisasi.index');
    }
}
