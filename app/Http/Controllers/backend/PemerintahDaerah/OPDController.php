<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Opd;
use Illuminate\Http\Request;

class OPDController extends Controller
{
    public function index()
    {
        return view('backend.pemerintah-daerah.opd.index',[
            'datas' => Opd::all(),
        ]);
    }

    public function create()
    {
        return view('backend.pemerintah-daerah.opd.create',[
            'data' => new Opd(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Opd::create($request->all());

        return redirect()->route('opd.index')->with('success','Data berhasil ditambahkan');
    }

    public function edit(Opd $opd)
    {
        return view('backend.pemerintah-daerah.opd.edit',[
            'data' => $opd,
            'submit' => 'Ubah'
        ]);
    }

    public function update(Request $request, Opd $opd)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $opd->update($request->all());

        return redirect()->route('opd.index')->with('success','Data berhasil diubah');
    }
}
