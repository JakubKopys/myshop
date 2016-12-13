<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function file() {
        return $this->belongsTo('App\Fileentry');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function recalculateRatings() {
        $reviews = $this->reviews();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating, 1);
        $this->rating_count = $reviews->count();
        $this->save();
    }
}
