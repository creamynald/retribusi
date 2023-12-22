<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Data;
use Illuminate\Http\Request;

class pemdaController extends Controller
{
    public function index()
    {
        return view('backend.pemerintah-daerah.pemda.index',[
            'data' => Data::first(),
        ]);
    }

    public function store(Request $request)
    {
        $data = Data::first();

        $data->update([
            'nama_pemkab' => $request->nama_pemkab,
            'nama_instansi' => $request->nama_instansi,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'kode_pos' => $request->kode_pos,
            'fax' => $request->fax,
            'website' => $request->website,
            'target_retribusi_tahun_ini' => $request->target_retribusi_tahun_ini,
        ]);

        $explode = explode(",",$request->target_retribusi_tahun_ini);
        $implode = implode("",$explode);

        $data->update([
            'target_retribusi_tahun_ini' => $implode,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');

    }
}
