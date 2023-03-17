<?php

use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Page\CartController;
use App\Http\Controllers\Page\CheckoutController;
use App\Http\Controllers\Page\LoginController as PageLoginController;

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
//=====================================Page============================================
//Main
Route::get('/',[MainController::class,'index']);
//NSX
Route::get('/nsx/{nsx}',[MainController::class,'show']);
//Product_detail
Route::get('/detail/{sp}',[MainController::class,'detail']);
//Cart
// Route::get('/cart',[CartController::class,'show']);
// Route::post('/cart',[CartController::class,'add']);
// Route::post('/cart',[CartController::class,'add']);
Route::prefix('cart')->group(function(){
    Route::get('/',[CartController::class,'show']);
    Route::post('/',[CartController::class,'add']);
    Route::get('/delete/{id}',[CartController::class,'delete']);
    Route::post('/update',[CartController::class,'update']);
});
//Login
Route::get('/login',[PageLoginController::class,'login']);
Route::post('/login',[PageLoginController::class,'show']);
//Register
Route::get('/register',[PageLoginController::class,'register']);
Route::post('/register',[PageLoginController::class,'add']);
//Logout
Route::get('/logout',[PageLoginController::class,'logout']);
//Checkout
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::get('/checkout/show',[CheckoutController::class,'show']);
Route::get('/checkout/detail/{id_dh}',[CheckoutController::class,'detail']);




//=====================================Admin_login============================================
Route::get('/admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/users/login/store',[LoginController::class,'store']);
Route::get('/admin/users/logout',[LoginController::class,'logout']);

//=====================================Admin============================================
    Route::prefix('admin')->group(function(){
        Route::get('/',[LoginController::class,'index'])->name('admin');
        Route::get('/main',[LoginController::class,'show']);
    //Menu
    Route::prefix('menus')->group(function(){
        Route::get('add',[MenuController::class,'create']);
        Route::post('add',[MenuController::class,'store']);
        Route::get('list',[MenuController::class,'index']);
        Route::get('edit/{nsx}',[MenuController::class,'show']);
        Route::post('edit/{nsx}',[MenuController::class,'update']);
        Route::DELETE('destroy',[MenuController::class,'destroy']);
    });
    //Product
    Route::prefix('product')->group(function(){
        Route::get('add',[ProductController::class,'create']);
        Route::post('add',[ProductController::class,'store']);
        Route::get('list',[ProductController::class,'index']);
        Route::get('edit/{sp}',[ProductController::class,'edit']);
        Route::post('edit/{sp}',[ProductController::class,'update']);
        Route::get('destroy/{sp}',[ProductController::class,'destroy']);
    });
    //Upload
    Route::get('upload/services',[UploadController::class,'store']);
    });
    //Customer
    Route::prefix('customer')->group(function(){
        Route::get('list',[MemberController::class,'show']);
    });
    //Orders
    Route::prefix('order')->group(function(){
        Route::get('list',[OrderController::class,'show']);
        Route::post('update/{id}',[OrderController::class,'update']);
    });
    //Main
// });

