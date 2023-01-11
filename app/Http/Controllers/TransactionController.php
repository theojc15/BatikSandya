<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function viewCart()
    {
        $categories = Category::all();
        $user = User::with('Product')->find(Auth::user()->id);
        $carts = Cart::where('user_id', 'like', Auth::user()->id)->get();
        // dd($carts);

        return view('user.cart', ['categories' => $categories, 'carts' => $carts, 'user' => $user]);
    }

    public function addCart(Request $request, Product $product)
    {
        $stok = $product->stok;

        $validate = $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        if ($request->quantity > $stok) {
            return redirect()->back()->withErrors('Quantity must be less than or equal to stock');
        }

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $product->id;
        $cart->qty = $request->quantity;

        $cart->save();
        \Illuminate\Support\Facades\Session::flash('message', 'Product has been added to cart');
        return redirect('/cart');
    }

    public function erase(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }
}