<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('home', compact('products'));
    }
}
