<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    public function new() {
        if (Auth::user() && Auth::user()->can('new-category', Category::class))  return view('categories.new');
        return redirect("/");
    }

    public function create(Request $request) {
        Category::create([
            'name' => $request['name']
        ]);

        return redirect("/");
    }

    public function edit(Category $category) {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $category->update([
            'name' => $request['name']
        ]);

        return redirect("/");
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect("/");
    }
}
