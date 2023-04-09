<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\VisiMisiTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class VisiMisiTujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = VisiMisiTujuan::all();

        return view('pages.admin.profil-sekolah.visi-misi-tujuan.index', compact('items'));
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
            'jenis' => ['required', 'string', 'in:visi,misi,tujuan'],
            'isi' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $check = VisiMisiTujuan::where('jenis', $request->jenis)->first();

        if ($check == NULL) {
            VisiMisiTujuan::create([
                'jenis' => $request->jenis,
                'isi' => $request->isi,
            ]);
        } else {
            Alert::toast('Gagal, Data Tersebut Sudah Ada', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Visi, Misi, dan Tujuan');

        Alert::toast('Berhasil Simpan Data', 'success')->position('top');
        return redirect()->route('visi-misi-tujuan.index');
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
            'jenis' => ['required', 'string', 'in:visi,misi,tujuan'],
            'isi' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $id);
        }

        $check = VisiMisiTujuan::where('jenis', $request->jenis)->first();
        $item = VisiMisiTujuan::findOrFail($id);

        if ($item->id == $id) {
            $item->update([
                'jenis' => $request->jenis,
                'isi' => $request->isi,
            ]);
        }elseif($check == NULL) {
            $item->update([
                'jenis' => $request->jenis,
                'isi' => $request->isi,
            ]);
        } else {
            Alert::toast('Gagal, Data Tersebut Sudah Ada', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Visi, Misi, dan Tujuan');

        Alert::toast('Berhasil Simpan Perubahan Data', 'success')->position('top');
        return redirect()->route('visi-misi-tujuan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = VisiMisiTujuan::findOrFail($id);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Visi, Misi, dan Tujuan');

        Alert::toast('Berhasil Hapus Data', 'success')->position('top');
        return redirect()->route('visi-misi-tujuan.index');
    }
}
