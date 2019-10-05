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

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => ['Adminsess']], function () {

   

	Route::get('/admin', 'AdminController@index')->name('admin.index');
    
    Route::get('/accounting', 'AccountingController@index')->name('accounting.index');
    Route::prefix('accounting')->group(function(){
        Route::get('/konfirmasi', 'AccountingController@index');
        Route::get('/konfirmasi/{id}', 'AccountingController@show');
        Route::post('/konfirmasi', 'AccountingController@confirm');
        Route::get('/tagihan', 'AccountingController@listTagihan');
        Route::get('/tagihan/{id}', 'AccountingController@tagihanDetail');
        Route::get('/laporan', 'AccountingController@listLaporan');
        Route::get('/laporan/{id}','AccountingController@detailLaporan');
    });
    
	

    Route::get('/marketing', 'MarketingController@index')->name('marketing.index');
    Route::prefix('marketing')->group(function(){
        Route::get('/pengadaan', 'MarketingController@index');
        Route::get('/pengadaan/{city}', 'MarketingController@showByCity');
        Route::get('/pengadaan/{city}/{id}', 'MarketingController@detailOrder');
        Route::post('/pengadaan/send', 'MarketingController@sendOrder');
        Route::get('/status-pemesanan', 'MarketingController@listStatusPemesanan');
        Route::get('/pengiriman', 'MarketingController@listPengiriman');
        Route::get('/pengiriman/{id}', 'MarketingController@detailPengiriman');
        Route::post('/pengiriman/send', 'MarketingController@kirimPengiriman');
    });
    
    Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::post('/category', 'CategoryController@store');
    Route::prefix('category')->group(function(){
        Route::get('/create', 'CategoryController@create');
        Route::get('/{id}', 'CategoryController@show')->name('category.show');
        Route::get('/{id}/edit', 'CategoryController@edit');
        Route::get('/{id}/delete', 'CategoryController@delete');
        Route::post('/search', 'CategoryController@search');
        Route::put('/{id}', 'CategoryController@update');
        Route::delete('/{id}', 'CategoryController@destroy');
    });

    Route::get('/product', 'ProductController@index')->name('product.index');
    Route::post('/product', 'ProductController@store');
    Route::prefix('product')->group(function(){
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::get('/{id}', 'ProductController@show');
        Route::get('/{id}/edit', 'ProductController@edit');
        Route::get('/{id}/delete', 'ProductController@delete');
        Route::post('/search', 'ProductController@search');
        Route::put('/{id}', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@destroy');
    });
   
    Route::get('/outside','OutsideController@index')->name('outside.index');
    Route::prefix('outside')->group(function(){
        Route::name('outside.')->group(function(){
            Route::get('/detail/{id}','OutsideController@detail')->name('detail');
            Route::post('/konfirmasi','OutsideController@konfirmasi')->name('konfirmasi');
        });
    });
    
});

Route::group(['middleware' => ['sess']], function () {
	Route::get('/home', 'HomeController@index')->name('home.index');
    Route::post('/home/search', 'HomeController@search')->name('home.search');
    Route::get('/home/product/{id}', 'HomeController@showProduct')->name('home.product');
    Route::get('/home/category/{id}', 'HomeController@showByCategory')->name('home.category');


    Route::get('/profile', 'UserprofileController@show')->name('userprofile.show');
    Route::prefix('profile')->group(function(){
        Route::get('/{id}/edit', 'UserprofileController@edit')->name('userprofile.edit');
        Route::put('/{id}', 'UserprofileController@update')->name('userprofile.update');
        Route::get('/tagihan','UserprofileController@listTagihan')->name('userprofile.tagihan');
        Route::get('/tagihan/{id}/{idTagihan}','UserprofileController@detailTagihan')->name('userprofile.detailTagihan');
    });
    

    Route::get('/order', 'OrderController@index')->name('order.index');
    Route::get('/order/{id}', 'OrderController@show')->name('order.show');

    //Route::get('/order/create','OrderController@create')->name('order.create');

    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.thanks');

    Route::get('/detailpesanan/{id}', 'OrderController@showHistoryDetail');
    Route::get('/detailpesanan/terima/{id}', 'OrderController@receiveOrder');
    Route::post('/uploadbukti', 'OrderController@uploadBuktiBayar');

    Route::post('/angsur','UserprofileController@angsur');

});

//Route::post('/cart', 'CartController@index');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@add');
Route::get('/delete-cart/{rowId}', 'CartController@remove');
//    Route::post('/cart/{id}', 'CartController@add');

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify');

Route::get('/registration', 'RegistrationController@index')->name('registration.index');
Route::post('/registration', 'RegistrationController@store');

Route::get('/logout', 'LogoutController@index');

Route::get('/tesss', 'LogoutController@testapi');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;
Route::get('/send-mail', function () {
 
    Mail::to('yfebiyan@gmail.com')->send(new MailtrapExample()); 
 
    return 'A message has been sent to Mailtrap!';
 
});

//Route::get('/home', 'HomeController@index')->middleware('sess');

//Route::resource('/supplier', 'SupplierController');
//Route::get('/supplier/{id}/delete', 'SupplierController@delete');
