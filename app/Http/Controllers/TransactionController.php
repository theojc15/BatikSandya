<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Handler\Proxy;
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

        $list = Cart::all();
        $flag = 0;
        for ($i = 0; $i < sizeof($list); $i++) {
            if ($product->id == $list[$i]->product_id) {
                $flag = 1;
                break;
            }
        }

        if ($flag == 1) {
            $cart = Cart::find($list[$i]->id);
            $cart->qty = $cart->qty + $request->quantity;
            $product = Product::find($cart->product_id);
            if ($cart->qty > $product->stok) {
                $cart->qty = $product->stok;
                \Illuminate\Support\Facades\Session::flash('message', 'Product reached its limit');
            } else {
                \Illuminate\Support\Facades\Session::flash('message', 'Product has been added to cart');
            }
            $cart->save();
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $product->id;
            $cart->qty = $request->quantity;
            $cart->save();
            \Illuminate\Support\Facades\Session::flash('message', 'Product has been added to cart');
        }
        return redirect('/cart');
    }

    public function erase(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }

    public function checkout() {
        $categories = Category::all();
        $carts = Cart::where('user_id', 'like', Auth::user()->id)->get();
        $user = User::with('Product')->find(Auth::user()->id);

        \Illuminate\Support\Facades\Session::flash('message', 'Checkout Successful');
        // return redirect('/');
        return view('user.checkout', ['categories' => $categories, 'carts'=>$carts, 'user' => $user]);
    }

    public function purchase(Request $request) {
        $validate = $request->validate([
            'name' => 'required|string|min:5',
            'username' => 'required|string|min:5',
            'email' => 'required|email:rfc,dns',
            'date_of_birth' => 'required|date|after:01-01-1900|before:today',
            'phone'=>'required|integer',
            'address'=> 'required'
        ]);

        $categories = Category::all();
        $carts = Cart::where('user_id', 'like', Auth::user()->id)->get();
        if (sizeof($carts) == 0) {
            \Illuminate\Support\Facades\Session::flash('message', 'No item in cart');
            return redirect()->back();
        }

        $transactionHeader = new TransactionHeader();
        $transactionHeader->user_id = Auth::user()->id;
        $transactionHeader->transaction_date = Carbon::now('GMT+7')->format('Y-m-d H:i:s');
        $transactionHeader->status = 'Not Done';
        $transactionHeader->save();

        $lastid = $transactionHeader->id;

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);

            $transactiondetail = new TransactionDetail();
            $transactiondetail->transaction_header_id = $lastid;
            $transactiondetail->product_id = $cart->product_id;
            $transactiondetail->quantity = $cart->qty;
            $transactiondetail->save();

            $product->stok -= $cart->qty;

            $product->save();
            $cart->delete();

        }
        \Illuminate\Support\Facades\Session::flash('message', 'Purchase Successful');
        return redirect('/');
    }

    public function inbox()
    {
        $categories = Category::all();
        $transactionHeader = TransactionHeader::where('status', 'like', 'Not Done')->get();

        return view('admin.inbox', ['categories' => $categories, 'transactionHeaders'=>$transactionHeader]);
    }

    public function confirm(TransactionHeader $transactionHeader) {
        $transactionHeader->status = 'Done';
        $transactionHeader->save();

        return redirect('/inbox');
    }

    public function cancel(TransactionHeader $transactionHeader) {
        $transactionDetails = TransactionDetail::where('transaction_header_id', 'like', $transactionHeader->id)->get();
        foreach($transactionDetails as $transactionDetail) {
            $product = Product::where('id', 'like', $transactionDetail->product_id)->get();
            $product[0]->stok += $transactionDetail->quantity;
            $product[0]->save();
        }
        $transactionDetails = TransactionDetail::where('transaction_header_id', 'like', $transactionHeader->id)->delete();
        $transactionHeader->delete();

        return redirect('/inbox');
    }

    public function history() {
        $categories = Category::all();
        $transactions = TransactionHeader::where('user_id', 'like', Auth::user()->id)
        ->where('status', 'like', 'Done')->get();

        return view('user.history', ['categories'=>$categories, 'transactions'=>$transactions]);
    }
}
