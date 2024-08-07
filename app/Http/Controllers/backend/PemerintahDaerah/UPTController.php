<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Opd;
use App\Models\Pemda\Upt;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UPTController extends Controller
{
    public function index()
    {
        if (
            auth()
                ->user()
                ->hasRole(Role::findByName('super admin'))
        ) {
            $data = Upt::all();
        } elseif (
            auth()
                ->user()
                ->hasRole(Role::findByName('admin'))
        ) {
            $data = Upt::all();
        } else {
            $data = Upt::where('opd_id', auth()->user()->opd_id)->get();
        }
        return view('backend.pemerintah-daerah.upt.index', [
            'datas' => $data,
        ]);
    }

    public function create()
    {
        
        if(auth()->user()->hasRole(Role::findByName('super admin'))){
            $data_opd = Opd::all();
        }elseif(auth()->user()->hasRole(Role::findByName('admin'))){
            $data_opd = Opd::all();
        }else{
            $data_opd = Opd::where('id', auth()->user()->opd_id)->get();
        }
        return view('backend.pemerintah-daerah.upt.create', [
            'data' => new Upt(),
            'data_opd' => $data_opd,

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

        return redirect()
            ->route('upt.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Upt $upt)
    {
        if(auth()->user()->hasRole(Role::findByName('super admin'))){
            $data_opd = Opd::all();
        }elseif(auth()->user()->hasRole(Role::findByName('admin'))){
            $data_opd = Opd::all();
        }else{
            $data_opd = Opd::where('id', auth()->user()->opd_id)->get();
        }
        return view('backend.pemerintah-daerah.upt.edit', [
            'data' => $upt,
            'data_opd' => $data_opd,
        ]);
    }

    public function update(Request $request, Upt $upt)
    {
        $request->validate([
            'opd_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $upt->update($request->all());

        return redirect()
            ->route('upt.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Upt $upt)
    {
        $upt->delete();

        return redirect()
            ->route('upt.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
