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
	'uses' => 'PageController@getHome',
]);
//Tìm kiếm
Route::get('tim-kiem', [
	'as' => 'search',
	'uses' => 'PageController@search',
]);
Route::get('search_filter/{id}', [
	'as' => 'search_filter',
	'uses' => 'PageController@search_filter',
]);
//chi tiết sp
Route::get('chi-tiet-san-pham/{id}', [
	'as' => 'product-detail',
	'uses' => 'PageController@productDetail',
]);
//giỏ hàng
Route::get('gio-hang', [
	'as' => 'gio-hang',
	'uses' => 'PageController@cart',
]);
//thêm vào giỏ

Route::get('gio-hang/{id}', [
	'as' => 'them-gio-hang',
	'uses' => 'PageController@addCart',
]);
//SP theo cate
Route::get('chuyen-muc/Id={id}', [
	'as' => 'get-product-cate',
	'uses' => 'PageController@getproCate',
]);

//SP theo subcate
Route::get('danh-muc/Id={id}', [
	'as' => 'get-product',
	'uses' => 'PageController@getProduct',
]);
//Xóa sp
Route::get('xoa-san-pham/{id}', [
	'as' => 'del-product',
	'uses' => 'PageController@delete',
]);
//Xóa giỏ hàng
Route::get('xóa-gio-hang', [
	'as' => 'del-cart',
	'uses' => 'PageController@deleteCart',
]);
// cập nhật giỏ
Route::get('cap-nhat-gio-hang/{id}/{qty}', [
	'as' => 'update-cart',
	'uses' => 'PageController@update',
]);

//checkout
Route::get('thanh-toan', [
	'as' => 'checkout',
	'uses' => 'PageController@checkout',
]);

//Dat hang
Route::get('dat-hang', [
	'as' => 'place-order',
	'uses' => 'PageController@placeOrder',
]);
//Comment
Route::post('binh-luan/id={p_id}', 'PageController@postComment')->name('post-comment');

//list order
Route::get('don-hang', [
	'as' => 'list-order',
	'uses' => 'PageController@listOrder',
]);
// order-detail
Route::get('chi-tiet-don-hang/id={id}', [
	'as' => 'order.detail',
	'uses' => 'PageController@getOrderDetail',
]);
// profile info
Route::get('ho-so-ca-nhan', [
	'as' => 'profile',
	'uses' => 'PageController@profile',
]);
Route::post('cap-nhat-ho-so', [
	'as' => 'update-profile',
	'uses' => 'PageController@updateProfile',
]);

Auth::routes();

//========================================================ADMIN========================================================
Route::group(['prefix' => 'admin'], function () {

// member
	// Route::get('/dang-nhap',['as' => 'account.getlogin','uses' => 'Admin\LoginController@showLoginForm']);
	// Route::post('/dang-nhap',['as' => 'postlogin' ,'uses' => 'Admin\LoginController@postLogin']);
	// Route::get('/dang-ky',['as'=> 'account.getregister','uses' =>'Admin\RegisterController@getRegister']);
	// Route::post('/dang-ky',['as'=> 'postregister','uses' =>'Admin\RegisterController@create']);
	Route::get('/', [
		'as' => 'admin',
		'uses' => 'Admin\LoginController@getLogin',
	]);
	Route::post('/', [
		'as' => 'login-admin',
		'uses' => 'Admin\LoginController@postLogin',
	]);

	Route::group(['middleware' => 'auth-admin'], function () {
		Route::get('/logout', function () {
			Session::forget('user');
			if (!Session::has('user')) {
				return redirect()->route('admin');
			}
		})->name('logout-admin');

		Route::get('/dashboard', [
			'as' => 'home-admin',
			'uses' => 'Admin\LoginController@dashboard',
		]);
		Route::get('/product', [
			'as' => 'product',
			'uses' => 'Admin\ProductsController@product',
		]);
		Route::get('/category', [
			'as' => 'category',
			'uses' => 'Admin\CategoriesController@category',
		]);
		Route::get('/category/edit/id={id}', [
			'as' => 'edit-cate',
			'uses' => 'Admin\CategoriesController@edit',
		]);
		Route::get('/category/edit-subcate/id={id}', [
			'as' => 'edit-sub-cate',
			'uses' => 'Admin\CategoriesController@editsub',
		]);
		Route::post('/category/update/Id={id}', [
			'as' => 'update-cate',
			'uses' => 'Admin\CategoriesController@update',
		]);
		Route::post('/category/update-subcate/Id={id}', [
			'as' => 'update-subcate',
			'uses' => 'Admin\CategoriesController@updateSub',
		]);
		Route::get('/customer', [
			'as' => 'customer',
			'uses' => 'Admin\CustomerController@customer',
		]);
		Route::get('/order', [
			'as' => 'order',
			'uses' => 'Admin\OrdersController@order',
		]);
		Route::get('/order-detail/{o_id}', [
			'as' => 'order-detail',
			'uses' => 'Admin\OrdersController@orderDetail',
		]);
		Route::get('/active/{o_id}', [
			'as' => 'active',
			'uses' => 'Admin\OrdersController@ActiveOrder',
		]);
		Route::get('/create', 'Admin\CategoriesController@create');
		Route::post('category/add-subcate', [
			'as' => 'add-subcate',
			'uses' => 'Admin\CategoriesController@addCate',
		]);
		Route::get('/delete-subcategory/id={id}', function ($id) {
			DB::table('subcategory')->where('Id', $id)->delete();
			return redirect()->route('category')->with('message', 'Đã xóa');
		})->name('del-sub');

		Route::get('order/delete/id={id}', 'Admin\OrdersController@deleteOrder')->name('del-order');
		Route::get('customer/delete/id={id}', 'Admin\CustomerController@delCustomer')->name('del-cus');

		Route::get('product/add', 'Admin\ProductsController@add')->name('add-product');
		Route::post('product/create', 'Admin\ProductsController@create')->name('create-product');
		Route::get('product/delete/id={id}', 'Admin\ProductsController@delete')->name('del-product');
		Route::get('product/edit/id={id}', 'Admin\ProductsController@getedit')->name('get-edit-pro');
		Route::post('product/edit/id={id}', 'Admin\ProductsController@postedit')->name('post-edit-pro');

		Route::get('comment', 'Admin\CustomerController@getComment')->name('comment');
		Route::get('comment/active-cmt/id={id}', 'Admin\CustomerController@active')->name('active-cmt');
		Route::get('comment/delete/id={id}', 'Admin\CustomerController@delete')->name('del-comment');
		//Statistic
		Route::get('statistic', 'Admin\StatisticController@statistic')->name('statistic');

		//Staff
		Route::get('staff', 'Admin\StaffController@getStaff')->name('get-staff');
		Route::get('del-staff/id={id}', 'Admin\StaffController@delStaff')->name('del-staff');
		Route::get('create-staff', 'Admin\StaffController@createStaff')->name('create-staff');
		Route::post('add-staff', 'Admin\StaffController@addStaff')->name('add-staff');
		Route::get('edit-staff/id={id}', 'Admin\StaffController@getedit')->name('get-edit');
		Route::post('edit-staff/id={id}', 'Admin\StaffController@editStaff')->name('edit-staff');

	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
