<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        $data = compact('category');
        return view('admin.pages.category')->with($data);
    }

    public function show(){
        return view('admin.pages.addcategory');
    }

    public function addcat(Request $request){

        $img_name = time().'.'.$request->cat_image->extension();
        $request->cat_image->move(public_path('myimages'), $img_name);

        $catagory = new Category;
        $catagory-> cat_name = $request['cat_name'];
        $catagory-> cat_image = $img_name;
        $catagory-> cat_description = $request['cat_description'];
        $catagory->save();
        return back();
    }

    public function editcat($id){
        $category = Category::where('cat_id',$id)->first();
        $data = compact('category');
        return view('admin.pages.editcat')->with($data);
    }

    public function update($id,Request $request){

        $request->validate([
            'cat_name'=> 'required',
            'cat_description'=> 'required',
            'cat_image'=> 'nullable'
        ]);

        $catagory = Category::where('cat_id',$id)->first();

        if(isset($request->cat_image)){
           $img_name = time().'.'.$request->cat_image->extension();
          $request->cat_image->move(public_path('myimages'), $img_name);
          $catagory-> cat_image = $img_name;
        }
        $catagory-> cat_name = $request['cat_name'];
        $catagory-> cat_description = $request['cat_description'];
        $catagory->save();
        return back();
    }

    public function delcat($id){
        Category::find($id)->delete();
        return redirect()->back();
    }

}
