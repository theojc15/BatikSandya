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

    public function adminProduct() {
        $categories = Category::all();

        return view('admin.dashboard', ['categories'=>$categories]);
    }

    public function addProduct() {
        $categories = Category::all();

        return view('admin.add', ['categories'=>$categories]);
    }

    public function detail($id) {
        $categories = Category::all();
        $product = Product::find($id);
        $products = Product::where([
            ['category_id', '=', $product->category_id],
            ['id', '!=', $id]
        ])->get();
        // dd($products);
        return view('all.detail', ['categories'=>$categories, 'product'=>$product, 'products'=>$products]);
    }

    public function viewcategory($id) {
        $categories = Category::all();

        $products = Product::where('category_id', 'like', $id)->paginate(10);

        return view('viewcategory', ['categories'=>$categories, 'products'=>$products]);
    }
}
