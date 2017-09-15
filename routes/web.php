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

/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('login/','LoginController@index');
Route::group(['namespace'=>'Admin'],function(){
    Route::get('admin/login','LoginController@index');
    Route::post('admin/create','LoginController@index');
    Route::get('admin/logout','LoginController@logout');
    Route::get('admin/index','IndexController@index');
    Route::get('admin/top','IndexController@top');
    Route::get('admin/left','IndexController@left');
    Route::get('admin/main','IndexController@main');
    Route::get('admin/footer','IndexController@footer');
    Route::get('admin/abc/{id}','IndexController@paiHang')->where('id','[0-3]+');
    Route::get('admin/admin_index','AdminController@index');
    Route::post('admin/admin_del','AdminController@del');
    Route::post('admin/admin_operate','AdminController@operate');
    Route::get('admin/admin_add','AdminController@add');
    Route::post('admin/admin_add','AdminController@add');
    Route::get('admin/admin_edit/{id}','AdminController@edit')->where('id','[0-9]+');
    Route::post('admin/admin_edit/{id}','AdminController@edit')->where('id','[0-9]+');
});

Route::group(['namespace'=>'Index'],function(){
    Route::get('index/','IndexController@index');
});
