<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('users/edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];

        if ($request['password']) $user->password = bcrypt($request['password']);

        $user->save();

        return back();
    }
}
