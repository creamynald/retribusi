<?php

namespace App\Http\Controllers\backend\permissions;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class userController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $users = User::get();
        return view('backend.permission.assign.user.index', compact('roles', 'users'));
    }

    public function store()
    {
        $user = User::find(request('email'));
        $user->assignRole(request('role'));

        return to_route('user.index');  
    }

    public function edit(User $user)
    {
        return view('backend.permission.assign.user.sync', [
            'user' => $user,
            'role' => $user->roles->first(),
            'roles' => Role::all()
        ]);
    }

    public function update(User $user)
    {
        $user->syncRoles(request('role'));

        return to_route('user.index');
    }
}
