<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function homeProduct()
    {
        $categories = Category::all();

        return view('all.dashboard', ['categories' => $categories]);
    }

    public function detail($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $products = Product::where([
            ['category_id', '=', $product->category_id],
            ['id', '!=', $id]
        ])->get();
        // dd($products);
        return view('all.detail', ['categories' => $categories, 'product' => $product, 'products' => $products]);
    }

    public function viewcategory($name)
    {
        $categories = Category::all();
        $category = Category::where('name', 'like', $name)->get();

        $products = Product::where('category_id', 'like', $category[0]->id)->paginate(10);
        if ($products->isEmpty()) {
            Session::flash('message', 'Product is not available yet');
            return redirect()->back();
        }

        return view('all.category', ['categories' => $categories, 'products' => $products]);
    }

    public function adminProduct()
    {
        $categories = Category::all();
        $products = Product::paginate(5, ['*'], 'products');
        $categories2 = Category::paginate(5, ['*'], 'categories');

        return view('admin.dashboard', ['categories' => $categories, 'products' => $products, 'categories2' => $categories2]);
    }

    public function addProduct()
    {
        $categories = Category::all();

        return view('admin.add', ['categories' => $categories]);
    }

    public function profile()
    {
        $categories = Category::all();

        return view('all.profile', ['categories' => $categories]);
    }
}