<?php

namespace App\Http\Controllers\backend\permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role, Permission};

class assignController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('backend.permission.assign.index', compact('roles'));
    }

    public function create()
    {
        return view('backend.permission.assign.create', [
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function store()
    {
    }
}
