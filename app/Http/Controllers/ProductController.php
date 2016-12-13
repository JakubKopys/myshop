<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Fileentry;
use Auth;
use User;
use Product;
use Image;
use Illuminate\Contracts\Auth\Access\Gate;

class ProductController extends Controller {
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }
}
