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
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin',function(){
	return view('admin.index');
})->name('admin.index');

// Product Admin

Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/create',"ProductController@create")->name('product.create');
Route::post('/product',"ProductController@store")->name('product.store');
Route::get('/product/{product}/edit','ProductController@edit')->name('product.edit');
Route::patch('/product/{product}','ProductController@update')->name('product.update');
Route::delete('/product/{product}','ProductController@destroy')->name('product.destroy');
Route::get('/invoice','InvoiceController@index')->name('invoice.index');


Route::get('/product/group-brand','ProductController@createGB')->name('product.GB');
Route::post('/brand','BrandController@store')->name('brand.store');
Route::post('/group','GroupController@store')->name('group.store');
Route::delete('/brand/{brand}','BrandController@destroy')->name('brand.destroy');


//Detail Product
Route::get('/item/{item}','ProductController@show')->name('product.show');

//Shopping Cart
Route::get('/cart','ProductController@cartIndex')->name('cart.index');
Route::get('/add-to-cart/{id}','ProductController@addToCart')->name('cart.add');
Route::delete('/remove-form-cart','ProductController@removeFormCart')->name('cart.remove');
Route::patch('/update-form-cart','ProductController@updateFormCart')->name('cart.update');

//Invoice
Route::post('/addinvoice','InvoiceController@storeInvoice')->name('invoice.store');