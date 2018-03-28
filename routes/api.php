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
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['namespace'=>'Api'],function (){
    Route::post('login','LoginController@index');
    Route::post('register','LoginController@register');

    Route::group(['middleware'=>'auth:api'],function (){
        Route::get('user',function (Request $request){
            return $request->user();
        });

        Route::get('passport','LoginController@getDetails');
    });


    /*Route::middleware('auth:api')->get('user', function (Request $request) {
        return $request->user();
    });

    Route::get('getDetails','LoginController@getDetails');*/

    Route::post('index','IndexController@index');
    Route::get('roma','IndexController@roma');
    Route::get('totti','IndexController@totti');
    Route::get('hash','IndexController@hash');
    Route::get('goods_index/{id}','GoodsController@index')->where(['id','[0-9]+']);
    Route::post('goods_all','GoodsController@all');
    Route::post('cates','CategoryController@cates');
    Route::get('cateByPid/{id}','CategoryController@cateByPid')->where(['id','[0-9]+']);
    Route::post('order','GoodsController@order');

    Route::resource('order_index',OrderController::class);

});

