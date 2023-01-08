<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function cart()
    {
        $categories = Category::all();

        return view('user.cart', ['categories' => $categories]);
    }
}
