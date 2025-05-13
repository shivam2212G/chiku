<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;


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

    public function logout(){
        return auth::logout();
    }

    public function addtocart($id){

        $cartarray = Product::where('product_id',$id)->first();

        $alredyincart = Cart::where('cart_name', $cartarray->product_name)->exists();

        if ($alredyincart) {
            return back();
        }
        else{
        $cart = new Cart;
        $cart-> cart_name = $cartarray->product_name;
        $cart-> cart_price = $cartarray->product_price;
        $cart-> cart_image = $cartarray->product_image;
        $cart-> cart_category = $cartarray->product_category;
        $cart-> cart_description = $cartarray->product_description;
        $cart->save();
        return back();
        }
    }

    public function usercart(){
        $cart = Cart::all();
        $data=compact('cart');
        return view('user.pages.cart')->with($data);
    }

    public function deletecart($id){
        Cart::find($id)->delete();
        return back();
    }

    public function userinfo(){
        $users = User::all();
        $data=compact('users');
        return view('admin.pages.userinfo')->with($data);
    }

    public function deleteuser($id){
        User::find($id)->delete();
        return back();
    }
}
