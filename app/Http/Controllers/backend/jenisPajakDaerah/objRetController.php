<?php

namespace App\Http\Controllers\backend\jenisPajakDaerah;

use App\Http\Controllers\Controller;
use App\Models\jenisRetribusiDaerah\jenisRetribusi;
use App\Models\jenisRetribusiDaerah\objekRetribusi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class objRetController extends Controller
{
    public function index()
    {
        return view('backend.jenPajDae.objek.index', [
            // join with jenis retribusi
            'datas' => objekRetribusi::with('jenisRetribusi')
                ->orderBy('kode', 'asc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('backend.jenPajDae.objek.create', [
            'data' => new objekRetribusi(),
            'jenisRetribusis' => jenisRetribusi::orderBy('kode', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'jenis_retribusi_id' => 'required',
                'kode' => 'required|unique:objek_retribusis,kode',
                'nama' => 'required',
            ],
            [
                'jenis_retribusi_id.required' => 'Jenis retribusi harus dipilih',
                'kode.required' => 'Kode harus diisi',
                'kode.unique' => 'Kode sudah digunakan, silahkan gunakan kode lain',
                'nama.required' => 'Nama harus diisi',
            ],
        );

        $kode = objekRetribusi::where('kode', $request->kode)->first();
        if ($kode) {
            return back()->with('error', 'Kode sudah digunakan');
        } else {
            objekRetribusi::create($request->all());
            return to_route('objek-retribusi.index');
        }
    }

    public function edit(objekRetribusi $objekRetribusi)
    {
        return view('backend.jenPajDae.objek.edit', [
            'data' => $objekRetribusi,
            'jenisRetribusis' => jenisRetribusi::orderBy('kode', 'asc')->get(),
        ]);
    }
    
    public function update(Request $request, objekRetribusi $objekRetribusi)
    {
        $request->validate(
            [
                'jenis_retribusi_id' => 'required',
                'kode' => 'required|unique:objek_retribusis,kode,' . $objekRetribusi->id,
                'nama' => 'required',
            ],
            [
                'jenis_retribusi_id.required' => 'Jenis retribusi harus dipilih',
                'kode.required' => 'Kode harus diisi',
                'kode.unique' => 'Kode sudah digunakan, silahkan gunakan kode lain',
                'nama.required' => 'Nama harus diisi',
            ],
        );

        $objekRetribusi->update($request->all());
        return to_route('objek-retribusi.index');
    }

    public function destroy(objekRetribusi $objekRetribusi)
    {
        $objekRetribusi->delete();
        return back();
    }
}
