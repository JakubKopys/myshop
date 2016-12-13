<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Product;
use Illuminate\Http\Request;
use Auth;
use User;
use CartItem;
use Cart;

class MainController extends Controller {

    public function index() {
        $users = User::all();
        $products = Product::all();
        return view('admin.main', compact('users', 'products'));
    }
}
