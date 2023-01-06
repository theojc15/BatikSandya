<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function homeProduct() {
        $categories = Category::all();

        return view('all.dashboard', ['categories'=>$categories]);
    }

    public function detail($id) {
        $categories = Category::all();
        $product = Product::find($id);
        $products = Product::where('category_id', '=', $product->category_id)->except($id);

        return view('all.detail', ['categories'=>$categories, 'product'=>$product, 'products'=>$product]);
    }
}
