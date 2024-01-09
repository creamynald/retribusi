<?php

namespace App\Http\Controllers\backend\jenisPajakDaerah;

use App\Http\Controllers\Controller;
use App\Models\jenisRetribusiDaerah\jenisRetribusi;
use Illuminate\Http\Request;

class jenRetController extends Controller
{
    public function index()
    {
        return view('backend.jenPajDae.retribusi.index', [
            'datas' => jenisRetribusi::orderBy('kode', 'asc')->get(),
        ]);
    }

    public function create()
    {
        return view('backend.jenPajDae.retribusi.create', [
            'data' => new jenisRetribusi(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
        ]);

        jenisRetribusi::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);

        return to_route('retribusi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(jenisRetribusi $retribusi)
    {
        return view('backend.jenPajDae.retribusi.edit', [
            'data' => $retribusi,
        ]);
    }

    public function update(Request $request, jenisRetribusi $retribusi)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
        ]);

        $retribusi->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);

        return to_route('retribusi.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(jenisRetribusi $retribusi)
    {
        $retribusi->delete();

        return to_route('retribusi.index')->with('success', 'Data berhasil dihapus');
    }
}
