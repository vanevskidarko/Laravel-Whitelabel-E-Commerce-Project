<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



 });
