<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
Route::get('/',[HomeController::class,'index']);
Route::get('/ourproducts',[HomeController::class,'ourproducts'])->name('ourproducts');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/redirect',[HomeController::class,'redirect'])->name('home')->middleware('auth','verified');


//category
Route::get('/admin/category', [CategoryController::class,'index'])->name('category');
Route::get('/admin/managecat', [CategoryController::class,'managecat'])->name('managecat');
Route::post('/admin/category-process', [CategoryController::class,'categoryProcess'])->name('category-process');
Route::get('/admin/deletecategory/{id}', [CategoryController::class,'deletecategory'])->name('deletecategory');
Route::get('/admin/updateCategory/{id}', [CategoryController::class,'updateCategoryForm'])->name('updateCategoryForm');
Route::post('/admin/category-update/{id}', [CategoryController::class,'categoryUpdate'])->name('category-update');


//product

Route::get('/admin/Add-product', [ProductController::class,'addproduct'])->name('addproduct');
Route::post('/admin/productProcess', [ProductController::class,'productProcess'])->name('productProcess');
Route::get('/admin/allproduct', [ProductController::class,'allproduct'])->name('allproduct');
Route::get('/admin/deleteproduct/{id}', [ProductController::class,'deleteproduct'])->name('deleteproduct');
Route::get('/admin/updateProductForm/{id}', [ProductController::class,'updateProductForm'])->name('updateProductForm');
Route::post('/admin/productEdit/{id}', [ProductController::class,'productEdit'])->name('productEdit');
Route::get('/productDetails/{id}', [ProductController::class,'productDetails'])->name('productDetails');

//cart
Route::post('/addCart/{id}', [CartController::class,'addCart'])->name('addCart');
Route::get('/showCart', [CartController::class,'showCart'])->name('showCart');
Route::get('/myorder', [CartController::class,'myorder'])->name('myorder');
Route::get('/deletecart/{id}', [CartController::class,'deletecart'])->name('deletecart');
Route::get('/routeCash', [CartController::class,'routeCash'])->name('routeCash');
Route::get('/stripe/{totalprice}', [CartController::class,'stripe'])->name('stripe');
Route::post('/stripe/{totalprice}', [CartController::class,'stripePost'])->name('stripe.post');


//order
Route::get('/admin/order',[OrderController::class,'order'])->name('order');
Route::get('/admin/delevery/{id}',[OrderController::class,'delevery'])->name('delevery');
Route::get('/admin/paid/{id}',[OrderController::class,'paid'])->name('paid');
Route::get('/admin/pdf/{id}',[OrderController::class,'pdf'])->name('pdf');
Route::get('/admin/mail/{id}',[OrderController::class,'mail'])->name('mail');
Route::post('/admin/sendmail/{id}',[OrderController::class,'sendmail'])->name('sendmail');
Route::post('/adminsearch',[OrderController::class,'search'])->name('adminsearch');

//review
Route::post('/review',[HomeController::class,'review'])->name('review');
Route::post('/addComment',[HomeController::class,'addComment'])->name('addComment');
Route::post('/addReply',[HomeController::class,'addReply'])->name('addReply');



Route::get('/blog',[HomeController::class,'blog'])->name('blog');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('/search',[ProductController::class,'search'])->name('productsearch');



//rating

Route::get('/rating',[RatingController::class,'rating'])->name('rating');
Route::get('/admin/approved/{id}',[RatingController::class,'approved'])->name('approved');