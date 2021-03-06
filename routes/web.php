<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', ["uses"=>"ProductsController@index", "as" => "allProducts"]);



Route::group(['middleware' => ['restrictToAdmin']], function(){

  // Admin panel
Route::get('admin/products', ["uses"=>"Admin\AdminProductsController@index", "as" => "adminDisplayProducts"]);

// display edit Product form
Route::get('admin/editProductForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductForm", "as" => "adminEditProductForm"]);

// display edit product image form
Route::get('admin/editProductImageForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductImageForm", "as" => "adminEditProductImageForm"]);

// update product image
Route::post('admin/updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage", "as" => "adminUpdateProductImage"]);

// update product data
Route::post('admin/updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as" => "adminUpdateProduct"]);

// display create Product form
Route::get('admin/createProductForm', ["uses"=>"Admin\AdminProductsController@createProductForm", "as" => "adminEditProductForm"]);

// create new product
Route::post('admin/sendCreateProductForm/', ["uses"=>"Admin\AdminProductsController@sendCreateProductForm", "as" => "adminUpdateProduct"]);


// delete products
Route::get('admin/deleteProduct/{id}', ["uses"=>"Admin\AdminProductsController@deleteProduct", "as" => "adminDeleteProduct"]);

// orders control Panel
Route::get('admin/deleteProduct/', ["uses" => "Admin\AdminProductsController@ordersPanel", "as" => "ordersPanel"]);

// delete orders
Route::get('admin/deleteOrder/{id}', ["uses"=>"Admin\AdminProductsController@deleteOrder", "as" => "adminDeleteOrder"]);

// display edit order form
Route::get('admin/editOrderForm/{id}', ["uses" => "Admin\AdminProductsController@editOrderForm", "as"=>"adminEditOrderForm"]);

// update order data
Route::post('admin/updateOrder/{id}', ["uses" => "Admin\AdminProductsController@updateOrder", "as"=>"adminUpdateOrder"]);

});




// show all products
Route::get('products', ["uses"=>"ProductsController@index", "as" => "allProducts"]);

// Men
Route::get('products/men', ["uses"=>"ProductsController@menProducts", "as" => "menProducts"]);

// Women
Route::get('products/women', ["uses"=>"ProductsController@womenProducts", "as" => "womenProducts"]);

// Search
Route::get('search', ["uses"=>"ProductsController@search", "as" => "searchProducts"]);


Route::get('product/addToCart/{id}', ["uses"=>"ProductsController@addProductToCart", "as"=>"AddToCartProduct"]);

// show cart items
Route::get('cart', ["uses"=>"ProductsController@showCart", "as"=>"cartProducts"]);

// delete item from cart
Route::get('product/deleteItemFromCart/{id}', ["uses"=>"ProductsController@deleteItemFromCart", "as"=>"DeleteItemFromCart"]);

// User Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// increase single product in cart
Route::get('product/increaseSingleProductInCart/{id}', ['uses'=>'ProductsController@increaseSingleProductInCart', 'as'=>'IncreaseSingleProductInCart']);

// Decrease single product in cart
Route::get('product/decreaseSingleProductInCart/{id}', ['uses'=>'ProductsController@decreaseSingleProductInCart', 'as'=>'DecreaseSingleProductInCart']);

// Create an Order
Route::get('product/createOrder/', ['uses'=>'ProductsController@createOrder', 'as'=>'createOrder']);

// Checkout Page
Route::get('product/checkoutProducts/', ['uses'=>'ProductsController@checkoutProducts', 'as'=>'checkoutProducts']);

// Proccess checkout page
Route::post('product/createNewOrder/', ['uses'=>'ProductsController@createNewOrder', 'as'=>'createNewOrder']);

// Payment page
Route::get('payment/paymentpage', ["uses"=>"Payment\PaymentsController@showPaymentPage", 'as'=>'showPaymentPage']);

// Proccess payment and receipt page
Route::get('payment/paymentreceipt/{paymentID}/{payerID}', ["uses"=>"Payment\PaymentsController@showPaymentReceipt", "as"=>"showPaymentReceipt"]);

// add to cart using ajax post request
Route::get('products/addToCartAjaxPost', ["uses"=>"ProductsController@addToCartAjaxPost", "as"=>"AddToCartAjaxPost"]);

// add to cart using get request
Route::get('products/addToCartAjaxGet/{id}', ["uses"=>"ProductsController@addToCartAjaxGet", "as"=>"AddToCartAjaxGet"]);
