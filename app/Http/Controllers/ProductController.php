<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function homeProduct() {
        $categories = Category::all();

        return view('all.dashboard', ['categories'=>$categories]);
    }
}
