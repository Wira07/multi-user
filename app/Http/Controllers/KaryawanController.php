<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:karyawan');
    }

    public function index()
    {
        $user = Auth::user();
        return view('karyawan.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('karyawan.edit', compact('user'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->jabatan = $request->jabatan;
        $user->save();

        return redirect()->route('karyawan.index')->with('success', 'Data berhasil diperbarui');
    }
}
