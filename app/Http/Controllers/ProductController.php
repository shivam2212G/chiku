<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(){
        $category = Category::all();
        $data = compact('category');
        return view('admin.pages.addproduct')->with($data);
    }

    public function addpro(Request $request){

        $img_name = time().'.'.$request->pro_image->extension();
        $request->pro_image->move(public_path('myimages'), $img_name);
        $product = new Product;
        $product-> product_name = $request['pro_name'];
        $product-> product_price = $request['pro_price'];
        $product-> product_image = $img_name;
        $product-> product_category = $request['pro_category'];
        $product-> product_description = $request['pro_description'];
        $product->save();
        return back();

    }

    public function edit($id){
        $product = Product::where('product_id',$id)->first();
        $category = Category::all();
        $data = compact('product','category');
        return view('admin.pages.editproduct')->with($data);
    }

    public function update($id,Request $request){
        $request->validate([
            'pro_image'=>' nullable'
        ]);
        $product = Product::where('product_id',$id)->first();

        if(isset($request->pro_image)){
            $img_name = time().'.'.$request->pro_image->extension();
            $request->pro_image->move(public_path('myimages'), $img_name);
            $product-> product_image = $img_name;
        }
        $product-> product_name = $request['pro_name'];
        $product-> product_price = $request['pro_price'];
        $product-> product_category = $request['pro_category'];
        $product-> product_description = $request['pro_description'];
        $product->save();
        return back();
    }


    public function delpro($id){
        Product::find($id)->delete();
        return redirect()->back();
    }

    public function adminpro(){
        $products = Product::all();
        $data = compact('products');
        return view('admin.pages.product')->with($data);
    }

    public function prosearch(Request $request){

        $search = $request['search'] ?? "";
        if($search!=""){
        // $products = Product::where('product_name', 'like', "%{$search}%")->get();
        $products=Product::where('product_name','LIKE',"%{$search}%")->orWhere('product_category','LIKE',"%{$search}%")->get();
        }
        else{
        $products = Product::all();
        }
        $data = compact('products','search');
        return view('user.pages.shop')->with($data);
    }
}
