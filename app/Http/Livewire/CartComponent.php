<?php

namespace App\Http\Livewire;

use \App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    public function increase($rowId)
    {
        $cart = Cart::find($rowId);
        $cart->qty += 1;
        $cart->save();
    }
    public function decrease($rowId)
    {
        $cart = Cart::find($rowId);
        $cart->qty -= 1;
        $cart->save();
    }
    public function render()
    {
        $categories = Category::all();
        $user = User::with('Product')->find(Auth::user()->id);
        $carts = Cart::where('user_id', 'like', Auth::user()->id)->get();

        return view('livewire.cart-component', ['carts' => $carts, 'user' => $user])->extends('layout.layout', ['categories' => $categories]);
    }
}