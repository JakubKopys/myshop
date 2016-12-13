<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Product;
use Auth;

class Review extends Model
{
    protected $fillable = [
        'comment', 'user_id', 'product_id', 'rating'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }

    // takes in product, comment and the rating and attaches the review to the product by its ID
    // then the average rating for the product is recalculated
    public function storeReviewForProduct(Product $product, $comment, $rating) {
        $this->user_id = Auth::user()->id;

        $this->comment = $comment;
        $this->rating = $rating;
        $product->reviews()->save($this);

        // recalculate ratings for the specified product
        $product->recalculateRatings();
    }
}
