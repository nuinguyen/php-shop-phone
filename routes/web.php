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
//User
Route::get('/dang-ky','UserController@dang_ky');
Route::get('/dang-nhap','UserController@dang_nhap');
Route::post('/signup','UserController@signup');
Route::get('/dang-xuat','UserController@dang_xuat');
Route::get('/profile','UserController@profile');
Route::post('/select-address','UserController@select_address');
Route::post('/save-profile','UserController@save_profile');
Route::get('/my-order','UserController@my_order');
Route::post('/order-my','UserController@order_my');

Route::get('/quen-mat-khau','UserController@quen_mat_khau');
Route::post('/recover-pass','UserController@recover_pass');

//Frontend

Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/search','HomeController@search');

// danh muc sp trang chu

Route::get('/danh-muc/{category_id}','CategoryController@show_category');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');


///Backend
/// admin

Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//  Admin User Order

Route::get('/view-order','OrderController@view_order');
Route::get('/order-detail/{order_id}','OrderController@order_detail');
Route::post('/status-order','OrderController@status_order');

// BANNER
Route::get('/banner','BannerController@banner');
Route::post('/add-banner','BannerController@add_banner');
Route::get('/delete-banner/{banner_id}','BannerController@delete_banner');


Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');

// Category

Route::get('/add-category','CategoryController@add_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/all-category','CategoryController@all_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');

// Classify

Route::get('/classify','ClassifyController@classify');
Route::post('/save-classify','ClassifyController@save_classify');
Route::get('/edit-classify/{classify_id}','ClassifyController@edit_classify');
Route::get('/delete-classify/{classify_id}','ClassifyController@delete_classify');
Route::post('/update-classify/{classify_id}','ClassifyController@update_classify');

//Producer

Route::get('/producer','ProducerController@producer');
Route::post('/save-producer','ProducerController@save_producer');
Route::get('/edit-producer/{producer_id}','ProducerController@edit_producer');
Route::get('/delete-producer/{producer_id}','ProducerController@delete_producer');
Route::post('/update-producer/{producer_id}','ProducerController@update_producer');



//Provider

Route::get('/provider','ProviderController@provider');
Route::post('/save-provider','ProviderController@save_provider');
Route::get('/edit-provider/{provider_id}','ProviderController@edit_provider');
Route::get('/delete-provider/{provider_id}','ProviderController@delete_provider');
Route::post('/update-provider/{provider_id}','ProviderController@update_provider');


// Product

Route::get('/product','ProductController@product');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/edit-category/{category_id}','ProductController@edit_category');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::post('/update-category/{category_id}','ProductController@update_category');

Route::post('/quickview','ProductController@quickview');

// albums

Route::post('select-gallery','ProductController@select_gallery');
Route::post('insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('update-gallery-name','GalleryController@update_gallery_name');
Route::post('delete-gallery','GalleryController@delete_gallery');
Route::post('update-gallery','GalleryController@update_gallery');


// Cart

Route::post('save-cart','CartController@save_cart');
Route::post('save-to-cart','CartController@save_to_cart');
Route::post('update-quantity','CartController@update_quantity');
Route::post('add-cart-ajax','CartController@add_cart_ajax');
Route::get('cart','CartController@cart');
Route::get('delete-to-cart/{pro_id}','CartController@delete_to_cart');
Route::get('show-cart','CartController@show_cart');


// CHECK out

Route::post('check-out','CheckoutController@check_out');
Route::post('select-ship-home','CheckoutController@select_ship_home');
Route::post('calculate-fee','CheckoutController@calculate_fee');
Route::post('calculate-sale','CheckoutController@calculate_sale');
Route::post('ship-receiver','CheckoutController@ship_receiver');


Route::post('chot-don','CheckoutController@chot_don');


// CHECK SALE

Route::post('check-sale','SaleController@check_sale');
Route::get('sale','SaleController@sale');
Route::post('insert-sale','SaleController@insert_sale');
Route::post('select-sale','SaleController@select_sale');
Route::get('delete-sale/{sale_id}','SaleController@delete_sale');


// Ship

Route::get('ship','ShipController@ship');
Route::post('select-ship','ShipController@select_ship');
Route::post('insert-ship','ShipController@insert_ship');
Route::post('select-feeship','ShipController@select_feeship');
Route::post('update-ship','ShipController@update_ship');



