<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index(){
        $search = "";
        $product = Product::all();
        $category = Category::all();
        $data = compact('product','category','search');
        return view('user.pages.index')->with($data);
    }
}
