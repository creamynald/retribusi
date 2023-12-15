<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Jabatan;
use App\Models\Pemda\Opd;
use App\Models\Pemda\Pangkat;
use App\Models\Pemda\Upt;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;
use Spatie\Permission\Models\Role;

class usersController extends Controller
{
    public function index()
    {
        return view('backend.pemerintah-daerah.pengguna.index', [
            'datas' => User::all()->except(1),
        ]);
    }

    public function create()
    {
        return view('backend.pemerintah-daerah.pengguna.create', [
            'data' => new User(),
            'opds' => Opd::all(),
            'upts' => Upt::all(),
        ]);
    }

    public function store(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'opd_id' => 'nullable',
            'upt_id' => 'nullable',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if(request()->has('opd_id') && request()->get('upt_id') == NULL) {
            $user->assignRole('opd');
        } elseif (request()->has('opd_id') && request()->has('upt_id')) {
            $user->assignRole('upt');
        }

        $user->save();

        Alert::success('Berhasil', 'Data berhasil ditambahkan');

        return to_route('pengguna.index');
    }

    public function edit($id)
    {
        return view('backend.pemerintah-daerah.pengguna.edit', [
            'data' => User::findOrFail($id),
            'opds' => Opd::all(),
            'upts' => Upt::all(),
            'submit' => 'Ubah'
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'opd_id' => 'nullable',
            'upt_id' => 'nullable',
        ]);

        if(request()->has('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);

        if(request()->has('opd_id') && request()->get('upt_id') == NULL) {
            $user->syncRoles('opd');
        } elseif (request()->has('opd_id') && request()->has('upt_id')) {
            $user->syncRoles('upt');
        }

        $user->save();

        Alert::success('Berhasil', 'Data berhasil diubah');

        return to_route('pengguna.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');

        return to_route('pengguna.index');
    }
}
