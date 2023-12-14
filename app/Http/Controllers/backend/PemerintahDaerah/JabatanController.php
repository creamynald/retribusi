<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        return view('backend.pemerintah-daerah.jabatan.index',[
            'datas' => Jabatan::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('backend.pemerintah-daerah.jabatan.create',[
            'data' => new Jabatan(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Jabatan::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jabatan.index')->with('success','Data berhasil ditambahkan');
    }

    public function edit(Jabatan $jabatan)
    {
        return view('backend.pemerintah-daerah.jabatan.edit',[
            'data' => $jabatan,
            'submit' => 'Update'
        ]);
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $jabatan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jabatan.index')->with('success','Data berhasil diupdate');
    }
}
