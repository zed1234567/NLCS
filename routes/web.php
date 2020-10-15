<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $products=App\Product::all();
    return view('index',compact('products'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin',function(){
	return view('admin.index');
})->name('admin.index');

// Product Admin

Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/create',"ProductController@create")->name('product.create');
Route::post('/product',"ProductController@store")->name('product.store');


Route::get('/product/group-brand','ProductController@createGB')->name('product.GB');
Route::post('/brand','BrandController@store')->name('brand.store');
Route::post('/group','GroupController@store')->name('group.store');
Route::delete('/brand/{brand}','BrandController@destroy')->name('brand.destroy');


//
Route::get('/item/{item}','ProductController@show')->name('product.show');