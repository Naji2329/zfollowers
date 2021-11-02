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

Route::get('/','StartController@welcome');
Route::get('services/{slug}','StartController@parent_service');
Route::get('services/{parent_slug}/{cat_slug}','StartController@cat_service');
Route::get('order/{service_slug}/{service_id}','StartController@order');
Route::get('login/order','StartController@login');
Route::post('login/order','StartController@dologin');
Route::get('contact','StartController@contact');
//socialite
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback');
Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');
//
Route::get('checkout/order','StartController@checkout');

Route::get('faq','StartController@faq');
Route::get('terms','StartController@terms');
Route::get('blogs','StartController@blogs');
Route::get('blog/{slug}','StartController@blog');
//payments
Route::post('pay','StartController@pay');
Route::get('/payment/approve','StartController@approve')->name('approved');
Route::get('/payment/cancel','StartController@cancel')->name('cancelled');
Route::get('/payment/callback','StartController@callback');

Auth::routes(['verify'=>true]);

Route::group(['middleware'=>'auth'],function(){
    Route::get('home/{status?}', 'HomeController@index')->name('home')->middleware('verified');
    
});

Route::get('test',function(){

   return  parents_with_cats()[0]->content  ;
    
});


//home-api
Route::get('api/filter_services/{cat_id?}','StartController@filter_services');
Route::post('api/save_session1','StartController@save_session1');
Route::post('api/get_sessions','StartController@get_sessions');
Route::get('api/get_auth','StartController@get_auth');


//admin routes
Config::set('auth.defines','admin');
Route::get('admin/login','AdminController@login')->name('adminlogin');
Route::post('admin/login','AdminController@dologin')->name('dologin');


Route::group(['middleware'=>'admin:admin'],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/','AdminController@index');
        Route::any('/logout','AdminController@logout')->name('adminlogout');
        Route::get('categories','CatsController@home')->name('admin.cats');
        Route::get('users','UsersController@home')->name('admin.users');
        Route::get('services','ServicesController@home')->name('admin.services');
        Route::get('faqs','FaqsController@home')->name('admin.faqs');
        Route::get('settings','SettingsController@home')->name('admin.settings');
        Route::get('profile','SettingsController@profile')->name('admin.profile');
        Route::get('blogs','BlogsController@home')->name('admin.blogs');
        Route::get('orders','OrdersController@home')->name('admin.orders');
        
        Route::resources([
            'api/cats'=>'CatsController',
            'api/users'=>'UsersController',
            'api/services'=>'ServicesController',
            'api/faqs'=>'FaqsController',
            'api/blogs'=>'BlogsController',
            'api/orders'=>'OrdersController',
        ]);
        //search
        Route::get('api/cats/search/{query}','CatsController@search');
        Route::get('api/users/search/{query}','UsersController@search');
        Route::get('api/services/search/{query}','ServicesController@search');
        Route::get('api/faqs/search/{query}','FaqsController@search');
        Route::get('api/blogs/search/{query}','BlogsController@search');
        Route::get('api/orders/search/{query}','OrdersController@search');
        //api
        Route::get('api/get_cats/{parent_id?}','CatsController@get_other_cats');
        Route::post('api/settings','SettingsController@update');
        Route::post('api/profile','SettingsController@update_profile');
        
        //filter
        Route::post('api/filter_cats','CatsController@filter_cats');
        Route::post('api/filter_orders','OrdersController@filter_orders');
        
        
    });
});
