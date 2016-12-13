<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use Product;
use Review;

class ReviewController extends Controller {

    public function create(Product $product) {
        return view('reviews.new', compact('product'));
    }

    public function store(Request $request, Product $product) {
        $review = new Review;
        $review->storeReviewForProduct($product, $request['comment'], $request['rating']);
        return redirect()->action('ProductController@show', [$review->product->id]);
    }
}
