<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testapi', 'LogoutController@testapi');
Route::post('/ambil/{param}', 'LogoutController@ambil');

Route::get('/produksi/getorders', 'OrderController@apiGetOrder');
Route::get('/produksi/order/detail/{id}', 'OrderController@apiOrderDetail');
Route::get('/produksi/order/update-wait/{id}', 'OrderController@apiUpdateWait');
Route::post('/produksi/order/list-proses-pembuatan', 'OrderController@apiGetProsesPembuatanList');
Route::get('/produksi/order/update-done/{id}', 'OrderController@apiUpdateDone');
Route::get('/produksi/in-production-list', 'OrderController@apiInProductionList');
Route::get('/produksi/done/confirm/{id}', 'OrderController@apiDoneProduction');

Route::get('/logistik/list-ready-pengiriman', 'OrderController@apiListReadyPengiriman');
Route::get('/logistik/detail-ready-pengiriman/{id}', 'OrderController@apiReadyPengirimanDetail');
Route::post('/logistik/send-ready-pengiriman', 'OrderController@apiReadyPengirimanSend');

Route::post('/api/test','OrderController@tesApi');
