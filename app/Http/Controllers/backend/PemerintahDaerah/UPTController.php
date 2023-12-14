<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Opd;
use App\Models\Pemda\Upt;
use Illuminate\Http\Request;

class UPTController extends Controller
{
    public function index()
    {
        // dd(Upt::all());
        return view('backend.pemerintah-daerah.upt.index',[
            'datas' => Upt::all(),
        ]);
    }

    public function create()
    {
        return view('backend.pemerintah-daerah.upt.create',[
            'data' => new Upt(),
            'data_opd' => Opd::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'opd_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
        
        Upt::create($request->all());

        return redirect()->route('upt.index')->with('success','Data berhasil ditambahkan');
    }

    public function edit(Upt $upt)
    {
        return view('backend.pemerintah-daerah.upt.edit',[
            'data' => $upt,
            'data_opd' => Opd::all(),
            'submit' => 'Ubah',
        ]);
    }
}
