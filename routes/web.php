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
Route::get('/read', 'API\APIController@read');

// Begin: Backend
     // Home
     Route::get('/admin', 'Admin\AdminController@admin')->middleware('checkUser');
     Route::post('/admin_login', 'Admin\AdminController@admin_login');

    // Group
    Route::group(['middleware' => 'checkLogin'] ,function() {
        Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function() {

            // Role:: Admin is used
            Route::middleware('roleAdmin')->group(function () {
                // Begin: Category
                    Route::get('/add_category', 'CategoryController@add_category');
                    Route::get('/edit_category/{id}', 'CategoryController@edit_category');
                    Route::post('/save_category', 'CategoryController@save_category');
                    Route::post('/update_category/{id}', 'CategoryController@update_category');
                    Route::get('/delete_category/{id}', 'CategoryController@delete_category');
                    Route::get('/active_cate/{id}', 'CategoryController@active_cate');
                    Route::get('/unactive_cate/{id}', 'CategoryController@unactive_cate');
                // End: Category

                // Begin: Provider
                    Route::get('/add_provider', 'ProviderController@add_provider');
                    Route::get('/edit_provider/{id}', 'ProviderController@edit_provider');
                    Route::post('/save_provider', 'ProviderController@save_provider');
                    Route::post('/update_provider/{id}', 'ProviderController@update_provider');
                    Route::get('/delete_provider/{id}', 'ProviderController@delete_provider');
                    Route::get('/active_prv/{id}', 'ProviderController@active_prv');
                    Route::get('/unactive_prv/{id}', 'ProviderController@unactive_prv');
                // End: Provider

                // Begin: Product
                    Route::get('/add_product', 'ProductController@add_product');
                    Route::get('/edit_product/{id}', 'ProductController@edit_product');
                    Route::post('/save_product', 'ProductController@save_product');
                    Route::post('/update_product/{id}', 'ProductController@update_product');
                    Route::get('/delete_product/{id}', 'ProductController@delete_product');
                    Route::get('/active/{id}', 'ProductController@active_prc');
                    Route::get('/unactive/{id}', 'ProductController@unactive_prc');
                // End: Product

                // Begin: Admin
                    Route::get('/add_admin', 'AdminController@add_admin');
                    Route::get('/all_admin', 'AdminController@all_admin');
                    Route::get('/edit_admin/{id}', 'AdminController@edit_admin');
                    Route::post('/save_admin', 'AdminController@save_admin');
                    Route::post('/update_admin/{id}', 'AdminController@update_admin');
                    Route::get('/delete_admin/{id}', 'AdminController@delete_admin');
                    Route::get('/search_list_by_roleId', 'AdminController@search_list_by_roleId');
                // End: Admin

                // Begin: Consumer
                    Route::get('/add_consumer', 'ConsumerController@add_consumer');
                    Route::get('/all_consumer', 'ConsumerController@all_consumer');
                    Route::get('/edit_consumer/{id}', 'ConsumerController@edit_consumer');
                    Route::post('/save_consumer', 'ConsumerController@save_consumer');
                    Route::post('/update_consumer/{id}', 'ConsumerController@update_consumer');
                    Route::get('/delete_consumer/{id}', 'ConsumerController@delete_consumer');
                    Route::get('/search_bill_user/{id}', 'ConsumerController@search_bill_user');
                // End: Consumer

            });
            // End Role Admin


            // Role::  Shipper is used
            Route::middleware('roleShipper')->group(function () {
                // Shipping Status : Bill
                Route::get('/change_bill_status/{id}', 'BillStatusController@change_bill_status');


            });

            // Role:: User is used
            Route::middleware('roleUser')->group(function () {
                // Home
                Route::get('/dashboard', 'AdminController@dashboard');
                Route::get('/admin_info', 'AdminController@info');
                Route::get('/admin_logout', 'AdminController@admin_logout');

                // Category
                Route::get('/all_category', 'CategoryController@all_category');
                Route::get('/show_category_by_id/{id}', 'CategoryController@show_category_by_id');
                Route::get('/show_category_status', 'CategoryController@show_category_status');

                // Provider
                Route::get('/all_provider', 'ProviderController@all_provider');
                Route::get('/show_provider_by_id/{id}', 'ProviderController@show_provider_by_id');
                Route::get('/show_provider_status', 'ProviderController@show_provider_status');

                // Product
                Route::get('/all_product', 'ProductController@all_product');
                Route::get('/show_product_by_id/{id}', 'ProductController@show_product_by_id');
                Route::get('/show_product_status', 'ProductController@show_product_status');

                // Bill - Shipping Bill - Bill Detail
                Route::get('/list_shipping', 'BillStatusController@list');
                Route::get('/list_bill', 'BillController@list');

                Route::get('/show_bill_status', 'BillStatusController@show_bill_status');
                Route::get('/detail_bill/{id}', 'BillController@detail');
                Route::get('/show_bill_product', 'BillStatusController@show_bill_product');

                // Contact Us
                Route::get('/list_contact', 'ContactController@list');
                Route::get('/detail_contact/{id}', 'ContactController@detail');


            });

        });

    });
    // END Group

// End: Backend


// Frontend
    Route::get('/','HomeController@index');
    Route::get('/home','HomeController@index');
    Route::get('/product','ProductController@index');
    Route::get('/about','AboutController@index');
    Route::get('/provider','ProviderController@index');
    //Product
    Route::post('/search','ProductController@search');
    Route::get('/categoryproduct/{category_id}','CategoryProduct@show_category_product');
    Route::get('/productdetails/{product_id}','ProductController@details_product');


    //Cart
    Route::post('/save-cart','CartController@save_cart');
    Route::post('/add-cart','CartController@add_cart');
    Route::get('/show-cart','CartController@show_cart');
    Route::get('/delete-cart/{rowId}','CartController@delete_cart');
    Route::post('/update-cart','CartController@update_cart');

    //CheckOut
    Route::get('/login-checkout','CheckoutController@login_checkout');
    Route::get('/logout-checkout','CheckoutController@logout_checkout');

    Route::post('/register-customer','CheckoutController@register_customer');
    Route::post('/login-customer','CheckoutController@login_customer');

    Route::get('/checkout','CheckoutController@checkout');
    Route::post('/order-place','CheckoutController@order_place');

    //Contact
    Route::get('/contact','ContactController@show_contact');
    Route::post('/save-contact','ContactController@save_contact');

    //Info
    Route::get('/accountinf','AccountinfController@show_accountinf');
    Route::post('/update-accountinf','AccountinfController@update_accountinf');
// End Frontend
