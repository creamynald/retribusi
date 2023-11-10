<?php

namespace App\Http\Controllers\backend\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index()
    {
        return view('backend.user.profile.index', [
            'user' => request()->user(),
        ]);
    }

    public function edit(Request $request)
    {
        return view('backend.user.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);
        
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $filename);
        }else{
            $filename = $request->user()->avatar;
        }

        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $filename,
            'password' => bcrypt($request->password),
        ]);

        return to_route('profile.index');
    }
}
