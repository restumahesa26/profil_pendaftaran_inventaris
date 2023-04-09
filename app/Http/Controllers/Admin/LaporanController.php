<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataRuangan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $items = DataRuangan::all();

        return view('pages.admin.inventaris.laporan.index', compact('items'));
    }

    public function pdf(Request $request)
    {
        $item = DataRuangan::findOrFail($request->ruangan_id);

        return view('pages.admin.inventaris.laporan.pdf', compact('item'));
    }
}
