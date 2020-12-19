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
    return view('welcome');
});

Route::get('/shop-sale', [
    'as'=>'home_client',
        'uses'=>'App\Http\Controllers\HomeController@index'
    ]
//   return view('page/home/client');
);

Route::post('/dashboard',[
    'as' =>'dashboard',
    'uses' =>  'App\Http\Controllers\AdminController@dashboard'
]);
Route::get('/login-admin',[
    'as'=>'admin_login',
   'uses' =>  'App\Http\Controllers\AdminController@index'
]);
Route::get('/logout-admin',[
    'as' => 'logout',
    'uses' =>'App\Http\Controllers\AdminController@logout'
]);
Route::get('/dashboard_admin',[
    'as'=>'dashboard_admin',
    'uses'=>'App\Http\Controllers\AdminController@show_dashboard'
]);
Route::prefix('shop_sale')->group(function (){
  Route::get('/cart', function (){
     return view('page/cart/show_cart');
  });
});

//Category
Route::prefix('categories')->group(function () {
    Route::get('/', [
        'as' => 'categories.index',
        'uses' => 'App\Http\Controllers\CategoryController@index'
    ]);
    Route::get('/create', [
        'as' => 'categories.create',
        'uses' => 'App\Http\Controllers\CategoryController@create'
    ]);
    Route::get('/all_category_product',[
        'as' =>'categories.list',
        'uses' => 'App\Http\Controllers\CategoryController@all_category_product'
    ]);
    Route::post('/save',[
        'as' =>'categories.save',
        'uses' => 'App\Http\Controllers\CategoryController@save'
    ]);
    Route::get('/edit_category_product/{id}',[
        'as' =>'categories.edit',
        'uses' => 'App\Http\Controllers\CategoryController@edit_category_product'
    ]);
    Route::post('/update_category_product/{id}',[
        'as' =>'categories.update',
        'uses' => 'App\Http\Controllers\CategoryController@update_category_product'
    ]);
    Route::get('/delete_category_product/{id}',[
        'as' =>'categories.delete',
        'uses' => 'App\Http\Controllers\CategoryController@delete_category_product'
    ]);
});
    Route::get('/active_category_product/{category_id}',
        'App\Http\Controllers\CategoryController@active_category_product'
    );
    Route::get('/unactive_category_product/{category_id}',
        'App\Http\Controllers\CategoryController@unactive_category_product'
    );

//Brand

Route::prefix('brand')->group(function () {
    Route::get('/', [
        'as' => 'brand.index',
        'uses' => 'App\Http\Controllers\BrandController@index'
    ]);
    Route::get('/create', [
        'as' => 'brand.create',
        'uses' => 'App\Http\Controllers\BrandController@create'
    ]);
    Route::get('/all_brand_product',[
        'as' =>'brand.list',
        'uses' => 'App\Http\Controllers\BrandController@all_brand_product'
    ]);
    Route::post('/save',[
        'as' =>'brand.save',
        'uses' => 'App\Http\Controllers\BrandController@save'
    ]);
    Route::get('/edit_brand_product/{id}',[
        'as' =>'brand.edit',
        'uses' => 'App\Http\Controllers\BrandController@edit_brand_product'
    ]);
    Route::post('/update_brand_product/{id}',[
        'as' =>'brand.update',
        'uses' => 'App\Http\Controllers\BrandController@update_brand_product'
    ]);
    Route::get('/delete_brand_product/{id}',[
        'as' =>'brand.delete',
        'uses' => 'App\Http\Controllers\BrandController@delete_brand_product'
    ]);
});
    Route::get('/active_brand_product/{brand_id}',
    'App\Http\Controllers\BrandController@active_brand_product'
    );
    Route::get('/unactive_brand_product/{brand_id}',
    'App\Http\Controllers\BrandController@unactive_brand_product'
    );
//Product Type
Route::prefix('product_type')->group(function () {
    Route::get('/', [
        'as' => 'product_type_index',
        'uses' => 'App\Http\Controllers\ProductTypeController@index'
    ]);
    Route::get('/create', [
        'as' => 'product_type_create',
        'uses' => 'App\Http\Controllers\ProductTypeController@create'
    ]);
    Route::get('/all_product_type',[
        'as' =>'product_type_list',
        'uses' => 'App\Http\Controllers\ProductTypeController@all_product_type'
    ]);
    Route::post('/save',[
        'as' =>'product_type_save',
        'uses' => 'App\Http\Controllers\ProductTypeController@save'
    ]);
    Route::get('/edit_product_type/{id}',[
        'as' =>'product_type_edit',
        'uses' => 'App\Http\Controllers\ProductTypeController@edit_product_type'
    ]);
    Route::post('/update_product_type/{id}',[
        'as' =>'product_type_update',
        'uses' => 'App\Http\Controllers\ProductTypeController@update_product_type'
    ]);
    Route::get('/delete_product_type/{id}',[
        'as' =>'product_type_delete',
        'uses' => 'App\Http\Controllers\ProductTypeController@delete_product_type'
    ]);
});

//Product

Route::prefix('product')->group(function () {
    Route::get('/', [
        'as' => 'product.index',
        'uses' => 'App\Http\Controllers\ProductController@index'
    ]);
    Route::get('/create', [
        'as' => 'product.create',
        'uses' => 'App\Http\Controllers\ProductController@create'
    ]);
    Route::get('/all_product',[
        'as' =>'product.list',
        'uses' => 'App\Http\Controllers\ProductController@all_product'
    ]);
    Route::post('/save',[
        'as' =>'product.save',
        'uses' => 'App\Http\Controllers\ProductController@save'
    ]);
    Route::get('/edit_product/{id}',[
        'as' =>'product.edit',
        'uses' => 'App\Http\Controllers\ProductController@edit_product'
    ]);
    Route::post('/update_product/{id}',[
        'as' =>'product.update',
        'uses' => 'App\Http\Controllers\ProductController@update_product'
    ]);
    Route::get('/delete_product/{id}',[
        'as' =>'product.delete',
        'uses' => 'App\Http\Controllers\ProductController@delete_product'
    ]);
});
    Route::get('/active_product/{brand_id}',
    'App\Http\Controllers\ProductController@active_product'
    );
    Route::get('/unactive_product/{brand_id}',
    'App\Http\Controllers\ProductController@unactive_product'
    );

//Shop-gird
Route::prefix('shop-gird')->group(function () {
    Route::get('/',[
        'as'=>'shop_gird.index',
       'uses'   => 'App\Http\Controllers\ShopGirdController@index'
    ]);
    Route::get('/category/{id}',[
        'as'=>'shop_gird.category',
        'uses'   => 'App\Http\Controllers\ShopGirdController@shop_gird_category'
    ]);
    Route::get('/brand/{id}',[
        'as'=>'shop_gird.brand',
        'uses'   => 'App\Http\Controllers\ShopGirdController@shop_gird_brand'
    ]);
    Route::get('/details_product/{id}',[
        'as'=>'details_product',
        'uses'   => 'App\Http\Controllers\ProductController@details_product'
    ]);
    Route::post('/details_product/{id}',[
        'as'=>'post_comment',
        'uses'   => 'App\Http\Controllers\ShopGirdController@PostComment'
    ]);
});

//Cart
    Route::post('/save-cart',[
        'as' =>'save_cart',
        'uses' =>'App\Http\Controllers\CartController@savecart'
    ]);
    Route::post('/save-cart-view',[
        'as' =>'save_cart_view',
        'uses' =>'App\Http\Controllers\CartController@save_cart_view'
    ]);
    Route::get('/show-cart',[
        'as' =>'show_cart',
        'uses' =>'App\Http\Controllers\CartController@showcart'
    ]);
    Route::get('/delete/{rowId}',[
        'as' =>'delete_cart',
        'uses' =>'App\Http\Controllers\CartController@deletecart'
    ]);
    Route::post('/update_cart_qty',[
        'as' => 'update_cart_qty',
        'uses' =>'App\Http\Controllers\CartController@updatecartqty'
    ]);
    Route::get('/clear_cart',[
        'as'=>'clear_cart',
        'uses'=>'App\Http\Controllers\CartController@clear_cart'
    ]);
//Check-out
    Route::get('/login',[
        'as' => 'login_checkout',
        'uses' => 'App\Http\Controllers\CheckoutController@login_checkout'
    ]);
    Route::get('/logout',[
        'as' => 'logout_checkout',
        'uses' => 'App\Http\Controllers\CheckoutController@logout_checkout'
    ]);
    Route::post('/add-customers',[
       'as' =>'add_customer',
        'uses' => 'App\Http\Controllers\CheckoutController@add_customer'
    ]);
    Route::get('/check-out',[
        'as' =>'checkout',
        'uses' =>'App\Http\Controllers\CheckoutController@checkout'
    ]);
    Route::post('login_customer',[
        'as' => 'login_customer',
        'uses' => 'App\Http\Controllers\CheckoutController@login_customer'
    ]);
    Route::post('order-place',[
        'as'=>'order_place',
        'uses' => 'App\Http\Controllers\CheckoutController@order_place'
    ]);
    Route::get('/send-email',[
       'as'=>'send_mail',
        'uses' => 'App\Http\Controllers\MailController@send_mail'
    ]);
// order_manage
    Route::get('/order-manager',[
        'as' =>'order_manager',
        'uses' => 'App\Http\Controllers\OrderController@order_manager'
    ]);
    Route::get('/view-order/{order_id}',[
        'as' =>'view_order',
        'uses' => 'App\Http\Controllers\OrderController@view_order'
    ]);
    Route::get('/print-order/{order_id}',[
        'as' =>'print_order',
        'uses'=>'App\Http\Controllers\OrderController@print_order'
    ]);
//Route::get('/login-facebook',
//    'App\Http\Controllers\AdminController@login_facebook');
//Route::get('/admin-login/callback',
//    'App\Http\Controllers\AdminController@callback_facebook');

    Route::get('/clothes_shop',[
       'as' =>'clothes_shop',
        'uses'=>'App\Http\Controllers\HomeController@index'
    ]);
Route::prefix('slider')->group(function () {
    Route::get('/add_slider',[
        'as'=>'add_slider',
        'uses' => 'App\Http\Controllers\SliderController@add_slider'
    ]);
    Route::post('/save_slider',[
        'as' =>'save_slider',
        'uses' => 'App\Http\Controllers\SliderController@save_slider'
    ]);
    Route::get('/all_slider',[
        'as' =>'all_slider',
        'uses' => 'App\Http\Controllers\SliderController@all_slider'
    ]);
    Route::get('/active_slide/{slide_id}',[
        'as'=>'active_slider',
        'uses'=>'App\Http\Controllers\SliderController@active_slide',
    ]);
    Route::get('/unactive_slide/{slide_id}',[
        'as'=>'unactive_slider',
        'uses'=>'App\Http\Controllers\SliderController@unactive_slide',
    ]);
    Route::get('/delete_product/{slide_id}',[
        'as' =>'slider_delete',
        'uses' => 'App\Http\Controllers\SliderController@delete_slide'
    ]);
});
Route::prefix('user')->group(function () {
    Route::get('/add_user',[
        'as'=>'add_user',
        'uses' => 'App\Http\Controllers\AdminController@add_user'
    ]);
    Route::post('/save_user',[
        'as' =>'save_user',
        'uses' => 'App\Http\Controllers\AdminController@save_user'
    ]);
    Route::get('/all_user',[
        'as'=>'all_user',
        'uses' =>'App\Http\Controllers\AdminController@all_user'
    ]);
//    Route::get('/active_slide/{slide_id}',[
//        'as'=>'active_slider',
//        'uses'=>'App\Http\Controllers\SliderController@active_slide',
//    ]);
//    Route::get('/unactive_slide/{slide_id}',[
//        'as'=>'unactive_slider',
//        'uses'=>'App\Http\Controllers\SliderController@unactive_slide',
//    ]);
//    Route::get('/delete_product/{slide_id}',[
//        'as' =>'slider_delete',
//        'uses' => 'App\Http\Controllers\SliderController@delete_slide'
//    ]);
});
    Route::get('/send-email/{order_id}',[
        'as'=>'send_mail_order',
        'uses' => 'App\Http\Controllers\MailController@send_mail_order'
    ]);
//Contact
    Route::get('/contact',[
        'as' =>'contact',
        'uses' => 'App\Http\Controllers\HomeController@contact'
    ]);

//Quickview
    Route::post('/quickview',[
       'as' =>'quickview',
       'uses'=>'App\Http\Controllers\ProductController@quickview'
    ]);
    Route::get('/search',[
        'as'=>'search',
        'uses'=>'App\Http\Controllers\ShopGirdController@search'
    ]);
    Route::post('/insert-rating',[
       'as'=>'insert_rating',
       'uses'=>'App\Http\Controllers\ShopGirdController@insert_rating'
    ]);

