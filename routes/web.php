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

Route::group(['namespace'=>'Index'],function(){
    Route::get('/','IndexController@index');
    Route::get('index/index','IndexController@index');
    Route::get('index/promotion/{id}','IndexController@promotion')->where('id','[0-9]+');
    Route::get('goods/index/{id1}/{id2}','GoodsController@index')->where('id1','[0-9]+')->where('id2','[0-3]');
    Route::get('integral/index','IntegralController@index');
    Route::get('newperson/index','NewPersonController@index');
    Route::get('order/index','OrderController@index');
    Route::get('active/index/{id}','ActiveController@index')->where('id','[0-9]+');
    Route::get('search/category/{id}','SearchController@category')->where('id','[0-9]+');
    Route::get('search/brand/{id}','SearchController@brand')->where('id','[0-9]+');
});

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
    Route::get('admin/brand_index','BrandController@index');
    Route::post('admin/brand_del','BrandController@del');
    Route::post('admin/brand_operate','BrandController@operate');
    Route::get('admin/brand_add','BrandController@add');
    Route::post('admin/brand_add','BrandController@add');
    Route::get('admin/brand_edit/{id}','BrandController@edit')->where('id','[0-9]+');
    Route::post('admin/brand_edit/{id}','BrandController@edit')->where('id','[0-9]+');
    Route::get('admin/category_index','CategoryController@index');
    Route::post('admin/category_del','CategoryController@del');
    Route::post('admin/category_operate','CategoryController@operate');
    Route::get('admin/category_add','CategoryController@add');
    Route::post('admin/category_add','CategoryController@add');
    Route::get('admin/category_edit/{id}','CategoryController@edit')->where('id','[0-9]+');
    Route::post('admin/category_edit/{id}','CategoryController@edit')->where('id','[0-9]+');
    Route::post('admin/category_cate','CategoryController@cate');
    Route::get('admin/order_index/{id}','OrderController@index')->where('id','[0-9]+');
    Route::get('admin/order_integral','OrderController@integral');
    Route::get('admin/order_aftermarket','OrderController@aftermarket');
    Route::post('admin/order_shipments','OrderController@shipments');
    Route::post('admin/order_agree','OrderController@agree');
    Route::get('admin/order_out/{a}/{b}/{c}/{d}','OrderController@out');
});
