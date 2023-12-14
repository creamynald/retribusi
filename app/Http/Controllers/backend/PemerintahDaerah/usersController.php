<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Jabatan;
use App\Models\Pemda\Pangkat;
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
            'datas' => User::all()->sortByDesc('nip'),
        ]);
    }

    public function create()
    {
        return view('backend.pemerintah-daerah.pengguna.create', [
            'data' => new User(),
            'golongans' => Pangkat::all(),
            'jabatans' => Jabatan::all(),
            'roles' => Role::where('name', '!=', 'super admin')->get(),
        ]);
    }

    public function store(User $user)
    {
        $data = request()->validate([
            'nip' => 'required|unique:users,nip',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'golongan_id' => 'required',
            'jabatan_id' => 'required',
            'role' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $user->assignRole($data['role']);

        Alert::success('Berhasil', 'Data berhasil ditambahkan');

        return to_route('pengguna.index');
    }

    public function edit()
    {
        // besok saja
    }
}
