<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test-email', function () {
    Mail::raw('This is a test email from Laravel via Gmail SMTP.', function ($message) {
        $message->to('shivamghogare2005@gmail.com')
                ->subject('Test Email');
    });
    return 'Email sent!';
});

Route::get('/',[MyController::class,'index'])->name('index');
Route::get('/prosearch',[ProductController::class,'prosearch'])->name('prosearch');
Route::get('/cart',function(){ return view('user.pages.cart');})->name('cart');
Route::get('/checkout',function(){ return view('user.pages.checkout');})->name('checkout');
Route::get('/contact',function(){ return view('user.pages.contact');})->name('contact');
Route::get('/detail',function(){ return view('user.pages.detail');})->name('detail');
Route::get('/shop',[ProductController::class,'userproduct'])->name('shop');
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');

//Admin
Route::get('/admin/dashboard',function(){ return view('admin.pages.index');})->name('admin.dashboard');

//Contact
Route::get('/admin/contact',[ContactController::class,'show'])->name('admin.contact');
Route::get('/admin/contact/delete/{id}',[ContactController::class,'delete'])->name('admin.contact.delete');

//Category
Route::get('/admin/category',[CategoryController::class,'index'])->name('admin.category');
Route::get('/admin/addcategory',[CategoryController::class,'show'])->name('admin.addcategory');
Route::post('/admin/addcategory',[CategoryController::class,'addcat'])->name('admin.addcategory');
Route::get('/admin/deletecategory/{id}',[CategoryController::class,'delcat'])->name('admin.delcategory');
Route::get('/admin/editcategory/{id}',[CategoryController::class,'editcat'])->name('admin.editcategory');
Route::put('/admin/editcategory/{id}',[CategoryController::class,'update'])->name('admin.updatecat');

//Products
Route::get('/admin/addproduct',[ProductController::class,'show'])->name('admin.addproduct');
Route::post('/admin/addproduct',[ProductController::class,'addpro'])->name('admin.addproduct');
Route::get('/admin/products',[ProductController::class,'adminpro'])->name('admin.products');
Route::get('/admin/deleteproduct/{id}',[ProductController::class,'delpro'])->name('admin.deleteproduct');
Route::get('/admin/editproduct/{id}',[ProductController::class,'edit'])->name('admin.editproduct');
Route::put('/admin/editproduct/{id}',[ProductController::class,'update'])->name('admin.updateproduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
