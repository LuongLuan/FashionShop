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
//trang chủ
Route::get('/', [
	'as' => 'trang-chu',
	'uses' => 'PageController@getHome'
]);
//Tìm kiếm
Route::get('search/{id?}', [
	'as' => 'search',
	'uses' => 'PageController@search'
]);
Route::get('search_filter/{id}', [
	'as' => 'search_filter',
	'uses' => 'PageController@search_filter'
]);
//chi tiết sp
Route::get('product-detail/{id}', [
	'as' => 'product-detail',
	'uses' => 'PageController@productDetail'
]);
//giỏ hàng
Route::get('shopping-cart', [
	'as' => 'gio-hang',
	'uses' => 'PageController@cart'
]);
//thêm vào giỏ

Route::get('add-cart/{id}', [
	'as' => 'them-gio-hang',
	'uses' => 'PageController@addCart'
]);
//SP theo cate
Route::get('get-product-cate/Id={id}', [
	'as' => 'get-product-cate',
	'uses' => 'PageController@getproCate'
]);
//SP theo subcate
Route::get('get-product/{id}', [
	'as' => 'get-product',
	'uses' => 'PageController@getProduct'
]);
//Xóa sp
Route::get('delete/{id}', [
	'as' => 'del-product',
	'uses' => 'PageController@delete'
]);
//Xóa giỏ hàng
Route::get('delete-cart', [
	'as' => 'del-cart',
	'uses' => 'PageController@deleteCart'
]);
// cập nhật giỏ
Route::get('update-cart/{id}/{qty}-{dk}', [
	'as' => 'update-cart',
	'uses' => 'PageController@update'
]);





//checkout
Route::get('checkout', [
	'as' => 'checkout',
	'uses' => 'PageController@checkout'
]);
//test
Route::get('test', [
	'as' => 'test',
	'uses' => 'PageController@loadCate'
]);

//Dat hang
Route::get('place-order', [
	'as' => 'place-order',
	'uses' => 'PageController@placeOrder'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





//========================================================ADMIN========================================================
Route::group(['prefix' => 'admin'],function(){
	Route::get('/product',[
		'as' => 'product',
		'uses' => 'Admin\ProductsController@product'
	]);
	Route::get('/category',[
		'as' => 'category',
		'uses' => 'Admin\CategoriesController@category'
	]);
	Route::get('/customer',[
		'as' => 'customer',
		'uses' => 'Admin\CustomerController@customer'
	]);
	Route::get('/order',[
		'as' => 'order',
		'uses' => 'Admin\OrdersController@order'
	]);
	Route::get('/order-detail/{o_id}',[
		'as' => 'order-detail',
		'uses' => 'Admin\OrdersController@orderDetail'
	]);
	Route::get('/active/{o_id}',[
		'as' => 'active',
		'uses' => 'Admin\OrdersController@ActiveOrder'
	]);
	Route::get('/create','Admin\CategoriesController@create');
	Route::post('/add-subcate',[
		'as' => 'add-subcate',
		'uses' => 'Admin\CategoriesController@addCate'
	]);
	Route::get('/',[
		'as' => 'dashboard',
		'uses' => 'Admin\OrdersController@dashboard'
	]);

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
