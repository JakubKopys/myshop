<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use User;
use Product;
use Category;
use Cart;
use CartItem;

class UserController extends Controller {
    public function edit(User $user) {
        //TODO: add Gates to editing/updating users
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, Request $request) {
        //TODO: validate
        $user->name = $request['name'];
        $user->email = $request['email'];

        if ($request['password']) $user->password = bcrypt($request['password']);

        $user->save();

        return redirect()->route('admin-users');
    }

    public function index() {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin-users');
    }
}