<?php

namespace App\Http\Controllers\backend\permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class permissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('backend.permission.permissions.index', compact('permissions'));
    }

    public function create()
    {

        $permission = new Permission;
        return view('backend.permission.permissions.create', compact('permission'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|string',
        ]);

        Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return to_route('permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view('backend.permission.permissions.edit', [
            'permission' => $permission,
            'submit' => 'Update'
        ]);
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required|string',
        ]);

        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return to_route('permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return to_route('permissions.index');
    }
}
