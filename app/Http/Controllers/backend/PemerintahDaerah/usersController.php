<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Opd;
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
        if(auth()->user()->hasRole(Role::findByName('super admin'))){
            $data_user = User::all();
        }elseif(auth()->user()->hasRole(Role::findByName('admin'))){
            $data_user = User::all()->except(1);
        }elseif(auth()->user()->hasRole(Role::findByName('opd'))){
            $data_user = User::where('opd_id', auth()->user()->opd_id)->get();
        }elseif(auth()->user()->hasRole(Role::findByName('upt'))){
            $data_user = User::where('upt_id', auth()->user()->upt_id)->get();
        }
        
        return view('backend.pemerintah-daerah.pengguna.index', [
            'datas' => $data_user,
        ]);
    }

    public function create()
    {
        //kondisi mencari data upd saat login sebagai super admin
        if(auth()->user()->hasRole(Role::findByName('super admin'))){
            $data_opd = Opd::all();
            $data_upt = Upt::all();
        //kondisi mencari data upd saat login sebagai admin
        }elseif(auth()->user()->hasRole(Role::findByName('admin'))){
            $data_opd = Opd::all();
            $data_upt = Upt::all();
        }else{
            $data_opd = Opd::where('id', auth()->user()->opd_id)->get();
            $data_upt = Upt::where(with(new Upt)->getTable().'.opd_id', auth()->user()->opd_id)->get();
        }

        return view('backend.pemerintah-daerah.pengguna.create', [
            'data' => new User(),
            'opds' => $data_opd,
            'upts' => $data_upt,
        ]);
    }

    public function store(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'opd_id' => 'nullable',
            'upt_id' => 'nullable',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if(request()->has('opd_id') && request()->get('upt_id') == NULL) {
            $user->syncRoles('opd');
        } elseif (request()->has('opd_id') && request()->has('upt_id')) {
            $user->syncRoles('upt');
        }

        $user->save();

        Alert::success('Berhasil', 'Data berhasil ditambahkan');

        return to_route('pengguna.index');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);

        //kondisi mencari data upd saat login sebagai super admin
        if(auth()->user()->hasRole(Role::findByName('super admin'))){
            $data_opd = Opd::all();
            $data_upt = Upt::all();
        //kondisi mencari data upd saat login sebagai admin
        }elseif(auth()->user()->hasRole(Role::findByName('admin'))){
            $data_opd = Opd::all();
            $data_upt = Upt::all();
        }else{
            $data_opd = Opd::where('id', auth()->user()->opd_id)->get();
            $data_upt = Upt::where(with(new Upt)->getTable().'.opd_id', auth()->user()->opd_id)->get();
        }

        return view('backend.pemerintah-daerah.pengguna.edit', [
            'data' => $data,
            'opds' => $data_opd,
            'upts' => $data_upt,
            'submit' => 'Ubah'
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'opd_id' => 'nullable',
            'upt_id' => 'nullable',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);
        
        $data['password'] = bcrypt($data['password']);

        $user = User::findOrFail($id);

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
}
