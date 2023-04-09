<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController2 extends Controller
{
    public function edit()
    {
        $item = Auth::user();

        return view('pages.profile', compact('item'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
        ]);

        if ($request->email !== Auth::user()->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            ]);
        }

        if ($request->username !== Auth::user()->username) {
            $request->validate([
                'username' => ['required', 'string', 'max:50', 'unique:users'],
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $item = User::where('id', Auth::user()->id)->first();

        $item->nama = $request->nama;
        $item->email = $request->email;
        $item->username = $request->username;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        Alert::toast('Berhasil Update Profile', 'success')->position('top');
        if (Auth::user()->role == 'admin') {
            return redirect()->route('profile.edit')->with('success', 'Berhasil Mengupdate Profile');
        }else {
            return redirect()->route('dashboard')->with('success', 'Berhasil Mengupdate Profile');
        }
    }
}
