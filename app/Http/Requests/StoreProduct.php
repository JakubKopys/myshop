<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreProduct extends FormRequest
{
    // only admins are allowed to add products.
    public function authorize()
    {
        if (Auth::user()) {
            return Auth::user()->admin;
        }
        return false;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:100',
            'description' => 'required|min:10|max:500',
            'price' => 'required|numeric',
            'image' => 'file|mimes:jpeg,bmp,png'
        ];
    }
}
