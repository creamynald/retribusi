<?php

namespace App\Http\Controllers\backend\jenisPajakDaerah;

use App\Http\Controllers\Controller;
use App\Models\jenisRetribusiDaerah\objekRetribusi;
use App\Models\jenisRetribusiDaerah\rincianObjek;
use Illuminate\Http\Request;

class rinObjController extends Controller
{
    public function index()
    {
        return view('backend.jenPajDae.rincianObjek.index',[
            'title' => 'Rincian Objek Retribusi',
            'datas' => rincianObjek::with('objekRetribusi')
                ->orderBy('kode', 'asc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('backend.jenPajDae.rincianObjek.create', [
            'title' => 'Tambah Rincian Objek Retribusi',
            'data' => new rincianObjek(),
            'objekRetribusis' => objekRetribusi::orderBy('kode', 'asc')->get(),
            'tahun' => [date('Y'), date('Y') + 1, date('Y') + 2, date('Y') + 3, date('Y') + 4],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'objek_retribusi_id' => 'required',
                'kode' => 'required|unique:rincian_objeks,kode',
                'nama' => 'required',
                'target' => 'nullable|numeric',
                'tahun' => 'nullable|numeric',
            ],
            [
                'objek_retribusi_id.required' => 'Objek retribusi harus dipilih',
                'kode.required' => 'Kode harus diisi',
                'kode.unique' => 'Kode sudah digunakan, silahkan gunakan kode lain',
                'nama.required' => 'Nama harus diisi',
            ],
        );

        $kode = rincianObjek::where('kode', $request->kode)->first();
        if ($kode) {
            return back()->with('error', 'Kode sudah digunakan');
        } else {
            rincianObjek::create($request->all());
            return to_route('rincian-objek.index');
        }
    }

    public function edit(rincianObjek $rincianObjek)
    {
        return view('backend.jenPajDae.rincianObjek.edit', [
            'title' => 'Edit Rincian Objek Retribusi',
            'data' => $rincianObjek,
            'objekRetribusis' => objekRetribusi::orderBy('kode', 'asc')->get(),
            'tahun' => [date('Y'), date('Y') + 1, date('Y') + 2, date('Y') + 3, date('Y') + 4],
        ]);
    }

    public function update(Request $request, rincianObjek $rincianObjek)
    {
        $request->validate(
            [
                'objek_retribusi_id' => 'required',
                'kode' => 'required|unique:rincian_objeks,kode,' . $rincianObjek->id,
                'nama' => 'required',
                'target' => 'nullable|numeric',
                'tahun' => 'nullable|numeric',
            ],
            [
                'objek_retribusi_id.required' => 'Objek retribusi harus dipilih',
                'kode.required' => 'Kode harus diisi',
                'kode.unique' => 'Kode sudah digunakan, silahkan gunakan kode lain',
                'nama.required' => 'Nama harus diisi',
            ],
        );

        $kode = rincianObjek::where('kode', $request->kode)->first();
        if ($kode) {
            return back()->with('error', 'Kode sudah digunakan');
        } else {
            $rincianObjek->update($request->all());
            return to_route('rincian-objek.index');
        }
    }

    public function destroy(rincianObjek $rincianObjek)
    {
        $rincianObjek->delete();
        return back();
    }

}
