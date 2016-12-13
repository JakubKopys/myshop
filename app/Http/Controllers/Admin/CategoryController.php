<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Category;
use Product;
use Auth;
use User;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function index() {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.new');
    }

    public function store(Request $request) {

        Category::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('admin-categories');
    }

    public function edit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $category->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('admin-categories');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin-categories');
    }
}