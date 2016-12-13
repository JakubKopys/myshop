<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cart;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cart() {
        return $this->hasOne('App\Cart');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function hasCart() {
        if (Cart::where('user_id', $this->id)->count() > 0) {
            return true;
        }
        return false;
    }

    public function isAdmin() {
        return $this->admin;
    }
}
