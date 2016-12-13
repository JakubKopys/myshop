<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Product;
use Illuminate\Http\Request;
use Auth;
use User;
use CartItem;
use Cart;
use Category;
use App\Http\Requests\StoreProduct;
use Image;

class ProductController extends Controller {

    public function index() {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function new()
    {
        if (Auth::user() && Auth::user()->can('create-product', Product::class)) {
            $categories = Category::all();
            return view('admin.products.new', compact('categories'));
        }
        return redirect("/");
    }

    public function create(StoreProduct $request)
    {
        if (Auth::user() && Auth::user()->can('create-product', Product::class)) {
            $filename = 'missing.png';
            $entry = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
                $entry = new Fileentry();
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $file->getClientOriginalName();
                $entry->filename = $file->getFilename() . '.' . $extension;
                $entry->save();
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . $image->getClientOriginalExtension();
                Image::make($image)->save(public_path('/uploads/product_images/' . $filename));
            }
            $product  = new Product();
            $product->file_id= $entry ? $entry->id : null;
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->image = $filename;
            $product->category_id = $request->input('category_id');
            $product->save();
        }
        return redirect()->route('admin-products');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('admin-products');
    }

    public function edit(Product $product)
    {
        $category = $product->category;
        $categories = Category::all()->except($category->id);
        return view('admin.products.edit', compact('product', 'categories', 'category'));
    }

    public function update(StoreProduct $request, Product $product)
    {
        if (Auth::user() && Auth::user()->can('update-product', Product::class)) {
            $filename = $product->image;
            $entry = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
                $entry = new Fileentry();
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $file->getClientOriginalName();
                $entry->filename = $file->getFilename() . '.' . $extension;
                $entry->save();
            }
            if ($request->hasFile('image')) {

                // before uploading new image check if product already have one and delete it if he does.
                if ($product->image != null) {
                    $old_image = $product->image;
                    File::delete($old_image);
                }

                $image = $request->file('image');
                $filename = time() . $image->getClientOriginalExtension();
                Image::make($image)->save(public_path('/uploads/product_images/' . $filename));
            }
            $product->file_id= $entry ? $entry->id : null;
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->image = $filename;
            $product->save();
        }
        return redirect()->route('admin-products');
    }
}
