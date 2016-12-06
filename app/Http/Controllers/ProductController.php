<?php

namespace App\Http\Controllers;

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

class ProductController extends Controller
{
    public function new()
    {
        if (Auth::user() && Auth::user()->can('create-product', Product::class)) {
            return view('products.new');
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
            $product->save();
        }
        return redirect("/");
    }

    public function index(){
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('products/edit', compact('product'));
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
        return redirect("/");
    }
}
