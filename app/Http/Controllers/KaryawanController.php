<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('karyawan', [
            'karyawan' => Karyawan::latest()->get()
        ]);
    }

    public function insert()
    {
        return view('karyawan_insert');
    }

    public function insert_action(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        Karyawan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('karyawan')->with('pesan', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        return view('karyawan_edit', [
            'karyawan' => Karyawan::find($id)
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        Karyawan::find($id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('karyawan')->with('pesan', 'Data Berhasil Diupdate!');
    }

    public function delete($id)
    {
        Karyawan::find($id)->delete();

        return redirect()->route('karyawan')->with('pesan', 'Data Berhasil Dihapus!');
    }
}
