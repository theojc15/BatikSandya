<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDO;

class ProductController extends Controller
{
    public function homeProduct()
    {
        $categories = Category::all();

        return view('all.dashboard', ['categories' => $categories]);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('name', 'like', '%' . $request->search . '%')->get();

        return view('all.search', ['categories'=>$categories, 'products'=>$products, 'search'=>$request->search]);
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
            return redirect('/');
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

    public function searchManage(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('name', 'like', '%' . $request->search . '%')->paginate(5, ['*'], 'products');
        $categories2 = Category::paginate(5, ['*'], 'categories');

        return view('admin.dashboard', ['categories' => $categories, 'products' => $products, 'categories2' => $categories2]);
    }

    public function addProductView()
    {
        $categories = Category::all();

        return view('admin.add', ['categories' => $categories]);
    }

    public function addProduct(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|integer|min:1',
            'stock' => 'required|integer|min:1',
            'link_tokopedia' => 'required',
            'link_shopee' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,png',
        ]);
        $extension = $request->photo->getClientOriginalExtension();

        $file = $request->photo->getClientOriginalName();

        $path = $request->photo->move('image', $file);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->detail = $request->description;
        $product->price = $request->price;
        $product->stok = $request->stock;
        $product->photo = $file;
        $product->tokopedia_link = $request->link_tokopedia;
        $product->shopee_link = $request->link_shopee;

        $product->save();

        Session::flash('message', 'Add Product Succesful');
        return redirect('/manage');
    }

    public function editProductView(Product $product)
    {
        $categories = Category::all();

        return view('admin.edit', ['categories' => $categories, 'product' => $product]);
    }

    public function editProduct(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|integer|min:1',
            'stock' => 'required|integer|min:1',
            'link_tokopedia' => 'required',
            'link_shopee' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        File::delete('image/' . $product->photo);

        $extension = $request->photo->getClientOriginalExtension();

        $file = $request->photo->getClientOriginalName();

        $path = $request->photo->move('image', $file);

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->detail = $request->description;
        $product->price = $request->price;
        $product->stok = $request->stock;
        $product->photo = $file;
        $product->tokopedia_link = $request->link_tokopedia;
        $product->shopee_link = $request->link_shopee;

        $product->save();
        Session::flash('message', 'Edit Product Succesful');
        return redirect('/manage');
    }

    public function delete(Product $product)
    {
        File::delete('image/' . $product->photo);
        $product->delete();
        Session::flash('message', 'Delete Product Succesful');
        return redirect('/manage');
    }

    public function addCategory(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        Session::flash('message', 'Add Category Succesful');
        return redirect('/manage');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('message', 'Delete Category Succesful');
        return redirect('/manage');
    }
}
