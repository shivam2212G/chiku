<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    // public function index()
    // {
    //     return view('home');
    // }
    public function index(){
        $search = "";
        $product = Product::all();
        $category = Category::all();
        $data = compact('product','category','search');
        return view('user.pages.index')->with($data);
    }
}
