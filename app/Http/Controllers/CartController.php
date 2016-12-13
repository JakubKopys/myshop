<?php

namespace App\Http\Controllers;

use Product;
use Illuminate\Http\Request;
use Auth;
use User;
use CartItem;
use Cart;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function addItem(Product $product) {
        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $cartItem  = new CartItem();
        $cartItem->product_id=$product->id;
        $cartItem->cart_id= $cart->id;
        $cartItem->save();

        return redirect('/cart');
    }

    public function show() {
        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total = 0;
        foreach($items as $item){
            $total += $item->product->price;
        }

        return view('carts/show', compact('items', 'total'));
    }

    public function removeItem(CartItem $cartItem) {
        $cartItem->delete();
        return redirect('/cart');
    }
}
