<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class WaliMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::withCount('pendaftaran')->where('role', 'wali-murid')->latest()->get();

        return view('pages.admin.ppdb.wali-murid.index', compact('items'));
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
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_wa' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'role' => 'wali-murid',
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'password' => Hash::make($request->password),
        ]);

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Wali Murid');

        Alert::toast('Berhasil Tambah Data', 'success')->position('top');
        return redirect()->route('wali-murid.index');
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
        $item = User::findOrFail($id);

        return view('pages.admin.ppdb.wali-murid.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_wa' => ['required', 'string', 'max:255'],
        ]);

        $item = User::findOrFail($id);

        if ($request->username != $item->username) {
            $request->validate([
                'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            ]);
        }

        if ($request->email != $item->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $item->nama = $request->nama;
        $item->username = $request->username;
        $item->email = $request->email;
        $item->no_wa = $request->no_wa;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Wali Murid');

        Alert::toast('Berhasil Ubah Data', 'success')->position('top');
        return redirect()->route('wali-murid.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findOrFail($id);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Wali Murid');

        Alert::toast('Berhasil Hapus Data', 'success')->position('top');
        return redirect()->route('wali-murid.index');
    }
}
