<?php

namespace App\Http\Controllers\backend\permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role, Permission};

class assignController extends Controller
{
    public function index()
    {
        return view('backend.permission.assign.index', [
            'roles' => Role::all(),
            'permissions' => Permission::all()
        ]);
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('success', 'Permission assigned to role successfully');
    }

    public function edit($id)
    {
        return view('backend.permission.assign.sync', [
            'role' => Role::find($id),
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);
        
        $role = Role::find($id);
        $role->syncPermissions($request->permissions);

        return to_route('assignable.index');
    }
}
