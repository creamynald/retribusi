<?php

namespace App\Http\Controllers\backend\permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class roleController extends Controller
{
    public function index()
    {
        $roles = Role::where('name', '!=', 'super-admin')->get();
        return view('backend.permission.roles.index', compact('roles'));
    }

    public function create()
    {
        $role = new Role();
        return view('backend.permission.roles.create', compact('role'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|string',
        ]);

        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return to_route('roles.index');
    }

    public function edit(Role $role)
    {
        return view('backend.permission.roles.edit', [
            'role' => $role,
            'submit' => 'Update',
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required|string',
        ]);

        $role->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return to_route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('roles.index');
    }
}
