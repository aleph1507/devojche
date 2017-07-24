<?php

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

use App\Category;
use App\Product;

// Route::get('/', function () {
// 	$categories = Category::all();
// 	$products = Product::all();
//     return view('welcome')->withCategories($categories)->withProducts($products);
// });

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/seller', 'SellerController');

Route::resource('/products', 'ProductsController');

Route::post('/products/delete/{product}', 'ProductsController@soft_delete')->name('products.sdel');
Route::delete('/products/pdelete/{product}', 'AdminController@delete_product')->name('products.pdel');
