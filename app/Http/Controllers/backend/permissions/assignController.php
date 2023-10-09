<?php

namespace App\Http\Controllers\backend\permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role, Permission};

class assignController extends Controller
{
    public function index()
    {
        $roles = Role::where('name', '!=', 'super admin')->get();
        return view('backend.permission.assign.index', compact('roles'));
    }

    public function create()
    {
        return view('backend.permission.assign.create', [
            'roles' => Role::where('name', '!=', 'super admin')->get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return to_route('assignable.index')->with('success', 'Permission assigned successfully');
    }
}
