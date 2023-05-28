<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\GuruStaf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GuruStafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = GuruStaf::all();

        return view('pages.admin.profil-sekolah.guru-staf.index', compact('items'));
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
            'nama' => ['required', 'string', 'max:255'],
            'bidang' => ['required', 'string', 'max:255'],
            'foto' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'pendidikan_terakhir_tingkat' => ['nullable', 'string', 'max:255'],
            'pendidikan_terakhir_jurusan' => ['nullable', 'string', 'max:255'],
            'pendidikan_terakhir_tahun_lulus' => ['nullable', 'string', 'numeric'],
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extension = $request->file('foto')->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('foto')->move(public_path('images/foto'), $imageNames);
        // $thumbnailpath = public_path('images/foto/' . $imageNames);
        // Image::make($thumbnailpath)->resize(900, 1200)->save($thumbnailpath);

        GuruStaf::create([
            'nama' => $request->nama,
            'bidang' => $request->bidang,
            'foto' => $imageNames,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'pendidikan_terakhir_tingkat' => $request->pendidikan_terakhir_tingkat,
            'pendidikan_terakhir_jurusan' => $request->pendidikan_terakhir_jurusan,
            'pendidikan_terakhir_tahun_lulus' => $request->pendidikan_terakhir_tahun_lulus,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Guru dan Staf');

        Alert::toast('Berhasil Simpan Data', 'success')->position('top');
        return redirect()->route('guru-staf.index');
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
            'nama' => ['required', 'string', 'max:255'],
            'bidang' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'pendidikan_terakhir_tingkat' => ['nullable', 'string', 'max:255'],
            'pendidikan_terakhir_jurusan' => ['nullable', 'string', 'max:255'],
            'pendidikan_terakhir_tahun_lulus' => ['nullable', 'string', 'numeric'],
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal, Perhatikan Kembali Data Yang Diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $id);
        }

        $item = GuruStaf::findOrFail($id);

        if ($request->foto) {
            $extension = $request->file('foto')->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            $request->file('foto')->move(public_path('images/foto'), $imageNames);
            // $thumbnailpath = public_path('images/foto/' . $imageNames);
            // Image::make($thumbnailpath)->resize(900, 1200)->save($thumbnailpath);
        }else {
            $imageNames = $item->foto;
        }

        $item->update([
            'nama' => $request->nama,
            'bidang' => $request->bidang,
            'foto' => $imageNames,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'pendidikan_terakhir_tingkat' => $request->pendidikan_terakhir_tingkat,
            'pendidikan_terakhir_jurusan' => $request->pendidikan_terakhir_jurusan,
            'pendidikan_terakhir_tahun_lulus' => $request->pendidikan_terakhir_tahun_lulus,
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Guru dan Staf');

        Alert::toast('Berhasil Simpan Perubahan Data', 'success')->position('top');
        return redirect()->route('guru-staf.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = GuruStaf::findOrFail($id);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Guru dan Staf');

        Alert::toast('Berhasil Hapus Data', 'success')->position('top');
        return redirect()->route('guru-staf.index');
    }
}
