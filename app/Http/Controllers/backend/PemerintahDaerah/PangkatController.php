<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Pangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PangkatController extends Controller
{
    public function index()
    {
        return view('backend.pemerintah-daerah.pangkat.index', [
            'datas' => Pangkat::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('backend.pemerintah-daerah.pangkat.create', [
            'data' => new Pangkat(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'golongan' => 'required',
            'pangkat' => 'required',
        ],[
            'golongan.required' => 'Golongan tidak boleh kosong',
            'pangkat.required' => 'Pangkat tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('pangkat.create')
                ->withErrors($validator)
                ->withInput();
        }

        Pangkat::create($request->all());
        
        return redirect()
            ->route('pangkat.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Pangkat $pangkat)
    {
        return view('backend.pemerintah-daerah.pangkat.edit', [
            'data' => $pangkat,
            'submit' => 'Update',
        ]);
    }

    public function update(Request $request, Pangkat $pangkat)
    {
        $request->validate([
            'golongan' => 'required',
            'pangkat' => 'required',
        ]);

        $pangkat->update($request->all());

        return redirect()
            ->route('pangkat.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Pangkat $pangkat)
    {
        $pangkat->delete();

        return redirect()
            ->route('pangkat.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
