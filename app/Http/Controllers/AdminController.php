<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $karyawan = User::where('role', 'karyawan')->get();
        return view('admin.index', compact('karyawan'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'role' => 'karyawan',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karyawan = User::findOrFail($id);
        return view('admin.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $karyawan->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('admin.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('admin.index')->with('success', 'Karyawan berhasil dihapus');
    }
}