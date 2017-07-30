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

Route::get('/contact', 'HomeController@get_contact')->name('contact.get');

Route::post('/contact', 'HomeController@post_contact')->name('contact.post');

Route::post('/soldby', 'HomeController@index');

Route::get('/cat/{category}', 'HomeController@get_category')->name('welcome.category');

Auth::routes();

Route::post('/cat/add', 'CategoryController@add_category')->name('category.add');

Route::delete('/cat/{catid}', 'CategoryController@del_category')->name('category.delete');

Route::post('/admin/selleractivation/{seller}', 'SellerController@smeni_activated')->name('seller.aktivnost');

Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/seller', 'SellerController');

// Route::get('/seller', 'SellerController@index')->name('seller.index');
// Route::post('/seller', 'SellerController@store')->name('seller.store');
// Route::get('/seller/create', 'SellerController@create')->name('seller.create');
// Route::get('/seller/{seller}', 'SellerController@destroy')->name('seller.destroy');


Route::resource('/products', 'ProductsController');

Route::post('/products/delete/{product}', 'ProductsController@soft_delete')->name('products.sdel');
Route::delete('/products/pdelete/{product}', 'AdminController@delete_product')->name('products.pdel');

Route::post('/cat/{catid}', 'CategoryController@rename')->name('category.rename');
