<?php

use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;
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

Route::get('/', [Front\HomeController::class, 'index'])->name('home');

Route::get('login', [Front\LoginController::class, 'getLogin'])->name('login');
Route::post('login', [Front\LoginController::class, 'postLogin'])->name('login.post');
Route::get('register', [Front\LoginController::class, 'getRegister'])->name('register');
Route::post('register', [Front\LoginController::class, 'postRegister'])->name('register.post');
Route::get('logout', [Front\LoginController::class, 'logout'])->name('logout');

Route::get('category/{category_slug}', [Front\HomeController::class, 'getProductsByCategory'])->name('category');

Route::get('brand/{brand_slug}', [Front\ProductCategoryController::class, 'getProductsByBrand'])->name('product_brand');

Route::get('detail/{product_slug}', [Front\ProductDetailController::class, 'getProductDetails'])->name('product.detail');
Route::get('send-comment', [Front\ProductDetailController::class, 'sendComment'])->name('comment.send');

Route::get('search', [Front\HomeController::class, 'getProductsByKey'])->name('search');

Route::group(['prefix' => 'cart'], function(){
	Route::get('show', [Front\CartController::class, 'show'])->name('cart.show');
	Route::get('add/{product_detail_id}', [Front\CartController::class, 'add'])->name('cart.add');
	Route::get('delete/{rowId}', [Front\CartController::class, 'delete'])->name('cart.delete');
	Route::get('update', [Front\CartController::class, 'update'])->name('cart.update');
	Route::get('destroy', [Front\CartController::class, 'destroy'])->name('cart.destroy');	
});

Route::group(['prefix' => 'checkout', 'middleware' => 'auth'], function(){
	Route::get('/', [Front\CheckoutController::class, 'index'])->name('checkout');
	Route::post('/', [Front\CheckoutController::class, 'checkout'])->name('checkout.post');
	Route::get('district',[Front\CheckoutController::class, 'getDistricts'])->name('district');
	Route::get('ward',[Front\CheckoutController::class, 'getWards'])->name('ward');
	Route::get('complete',[Front\CheckoutController::class, 'complete'])->name('complete');
	Route::get('profile', [Front\CheckoutController::class, 'getProfile'])->name('profile');
	Route::get('order_detail/{id}',[Front\CheckoutController::class, 'getOrderDetails'])->name('orderDetail');
	Route::get('vnpay/{id}',[Front\VNPayController::class, 'index'])->name('vnpay');
	Route::post('vnpay', [Front\VNPayController::class, 'vnpayPayment'])->name('vnpay.post');
	Route::get('vnpay/return/save',[Front\VNPayController::class, 'getInfoVNPayPayment'])->name('vnpay.save');
	Route::get('order/cancel/{id}',[Front\CheckoutController::class, 'cancelOrder'])->name('order.cancel');
});

Route::get('login/admin', [Admin\LoginController::class, 'getLogin'])->name('admin.login');
Route::post('login/admin', [Admin\LoginController::class, 'postLogin'])->name('admin.login.post');
Route::get('logout/admin', [Admin\LoginController::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdminLogin'], function(){
	Route::get('/', [Admin\HomeController::class, 'index'])->name('admin.home');
	Route::post('filter', [Admin\HomeController::class, 'filterByDate'])->name('admin.filter.order');
	Route::post('filter_default', [Admin\HomeController::class, 'filterDefault'])->name('admin.filter.default');
	Route::get('category_statistic', [Admin\HomeController::class, 'categoryStatistic'])->name('admin.category.statistic');
	
	Route::resource('category', Admin\ProductCategoryController::class)->except(['create', 'show']);
	Route::resource('brand', Admin\BrandController::class)->except(['show']);
	Route::resource('category_id/{id}/product', Admin\ProductController::class)->except(['update']);
	Route::post('product/update/{id}', [Admin\ProductController::class, 'updateProductInfo'])->name('product.update.info');

	Route::get('product_detail/show/{id}', [Admin\ProductDetailController::class, 'index'])->name('detail.index');
	Route::post('product_detail/store/{product_id}/color', [Admin\ProductDetailController::class, 'storeColor'])->name('detail.color.store');
	Route::get('product_detail/edit/{id}/color', [Admin\ProductDetailController::class, 'editColor'])->name('detail.color.edit');
	Route::post('product_detail/update/{id}/color', [Admin\ProductDetailController::class, 'updateColor'])->name('detail.color.update');
	Route::delete('product_detail/destroy/{id}/color', [Admin\ProductDetailController::class, 'destroyColor'])->name('detail.color.destroy');

	Route::post('product_detail/store_new_spec/new_specification', [Admin\ProductDetailController::class, 'storeNewSpec'])->name('detail.newspec.store');
	Route::get('product_detail/create/{product_id}/specification', [Admin\ProductDetailController::class, 'createSpec'])->name('detail.spec.create');
	Route::post('product_detail/store/{product_id}/specification', [Admin\ProductDetailController::class, 'storeSpec'])->name('detail.spec.store');
	Route::get('product_detail/edit/{product_id}/specification/type/{type_id}', [Admin\ProductDetailController::class, 'editSpec'])->name('detail.spec.edit');
	Route::post('product_detail/update/{product_id}/specification/type/{type_id}', [Admin\ProductDetailController::class, 'updateSpec'])->name('detail.spec.update');
	Route::delete('product_detail/destroy/{product_id}/specification/type/{type_id}', [Admin\ProductDetailController::class, 'destroySpec'])->name('detail.spec.destroy');

	Route::get('order', [Admin\OrderController::class, 'index'])->name('order.index');
	Route::get('order/detail', [Admin\OrderController::class, 'getDetails'])->name('order.detail');
	Route::post('order/browsing', [Admin\OrderController::class, 'browsing'])->name('order.browsing');

	Route::get('account', [Admin\HomeController::class, 'getAccount'])->name('admin.account');
});


