<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Periode::orderByRaw("FIELD(status , 'buka', 'tutup') ASC")->get();

        return view('pages.admin.ppdb.periode.index', compact('items'));
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
            'periode' => 'required|string|max:255',
            'status' => 'required|in:buka,tutup'
        ]);

        $check = Periode::where('status', 'buka')->first();

        if ($request->status == 'buka') {
            if ($check != NULL) {
                Alert::toast('Gagal, Data Status Buka Sudah Tersedia', 'error')->position('top');
                return back()->withInput();
            } else {
                Periode::create([
                    'periode' => $request->periode,
                    'status' => $request->status
                ]);
            }
        }else {
            Periode::create([
                'periode' => $request->periode,
                'status' => $request->status
            ]);
        }

        ActivityLog::createViewLog(Auth::user()->id, 'Menambah Data Periode');

        Alert::toast('Berhasil Simpan Data', 'success')->position('top');
        return redirect()->route('periode.index');
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
        $item = Periode::findOrFail($id);

        return view('pages.admin.ppdb.periode.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'periode' => 'required|string|max:255',
            'status' => 'required|in:buka,tutup'
        ]);

        $check = Periode::where('status', 'buka')->first();

        $item = Periode::findOrFail($id);

        if ($request->status == 'buka') {
            if ($item->status == 'buka') {
                $item->update([
                    'periode' => $request->periode,
                    'status' => $request->status
                ]);
            }elseif ($check == NULL) {
                $item->update([
                    'periode' => $request->periode,
                    'status' => $request->status
                ]);
            }else {
                Alert::toast('Gagal, Data Status Buka Sudah Tersedia', 'error')->position('top');
                return back()->withInput();
            }
        }else {
            $item->update([
                'periode' => $request->periode,
                'status' => $request->status
            ]);
        }

        ActivityLog::createViewLog(Auth::user()->id, 'Mengubah Data Periode');

        Alert::toast('Berhasil Ubah Data', 'success')->position('top');
        return redirect()->route('periode.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Periode::findOrFail($id);

        $item->delete();

        ActivityLog::createViewLog(Auth::user()->id, 'Menghapus Data Periode');

        Alert::toast('Berhasil Hapus Data', 'success')->position('top');
        return redirect()->route('periode.index');
    }
}
