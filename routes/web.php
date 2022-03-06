<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

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

Route::get('/','Admin\FrontendController@index');

Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard',function(){
       return view('admin.dashboard');
    });
 });

 Route::post('/add-to-cart','Frontend\CartController@addProduct');
 Route::post('delete-cart-items','Frontend\CartController@deleteCartItems');
 Route::post('update-cart','Frontend\CartController@updateCart');
Route::get('cart','Frontend\CartController@viewCart');
Route::post('place-order','Frontend\CheckoutController@placeOrder');

Route::get('checkout','Frontend\CheckoutController@index');
Route::get('my-orders','Frontend\UserController@index');
Route::get('view-order/{id}','Frontend\UserController@view');
Route::get('wishlist','Frontend\WishlistController@index');
Route::post('/add-to-wishlist','Frontend\WishlistController@add');
Route::post('delete-wishlist-items','Frontend\WishlistController@delete');

 Route::middleware(['auth'])->group(function(){
    Route::post('/place-order','Frontend\CheckoutController@placeorder');
    Route::get('view-category/{slug}','Frontend\FrontendController@viewCategory');
    Route::get('category/{slug}/{prod_name}','Frontend\FrontendController@productView');
    Route::get('/category','Frontend\FrontendController@category');
 });


 Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard','Admin\FrontendController@index');
    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-prod/{id}','Admin\CategoryController@edit');
    Route::put('update-category/{id}','Admin\CategoryController@update');
    Route::get('delete-category/{id}', 'Admin\CategoryController@destroy');

    Route::get('products','Admin\ProductController@index');
    Route::get('add-product','Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('edit-product/{id}','Admin\ProductController@edit');
    Route::put('update-product/{id}','Admin\ProductController@update');
    Route::get('delete-product/{id}', 'Admin\ProductController@destroy');



    Route::get('users','Admin\FrontendController@users');
    Route::get('orders','Admin\OrderController@index');
    Route::get('admin/view-order/{id}','Admin\OrderController@view');
    Route::put('update-order/{id}','Admin\OrderController@update');
    Route::get('order-history/','Admin\OrderController@orderHistory');

    Route::get('users','Admin\DashboardController@index');

 });
