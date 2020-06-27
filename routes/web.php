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


//vue或react入口路由
Route::get('{path?}', function () {
    return view('app');
})->where('path', '.*');


//中间件
Route::group(['namespace'=>'Wap','prefix'=>'wap','middleware'=>'login'],function(){
   Route::get('base','BaseController@index');
});
/*Route::namespace('Wap')->group(function (){
    Route::get('wap/base','BaseController@index');
});*/

Route::group(['namespace'=>'Index'],function(){
    Route::get('/','IndexController@index');
    Route::get('index/index','IndexController@index');
    Route::get('index/promotion/{id}','IndexController@promotion')->where('id','[0-9]+');
    Route::get('index/location','IndexController@location');
    Route::get('goods/index/{id1}/{id2}','GoodsController@index')->where('id1','[0-9]+')->where('id2','[0-3]');
    Route::get('integral/index','IntegralController@index');
    Route::get('newperson/index','NewPersonController@index');
    Route::get('order/index','OrderController@index');
    Route::get('order/order/{id}','OrderController@order')->where('id','[0-5]');
    Route::get('order/refund_order','OrderController@refund_order');
    Route::post('order/del','OrderController@del');
    Route::post('order/receiving','OrderController@receiving');
    Route::post('order/pay','OrderController@pay');
    Route::get('order/info/{id}','OrderController@info')->where('id','[0-9]+');
    Route::get('order/refund/{oid}/{gid}','OrderController@refund')->where('oid','[0-9]+')->where('gid','[0-9]+');
    Route::post('order/refund/{oid}/{gid}','OrderController@refund')->where('oid','[0-9]+')->where('gid','[0-9]+');
    Route::get('active/index/{id}','ActiveController@index')->where('id','[0-9]+');
    Route::get('search/category/{id}','SearchController@category')->where('id','[0-9]+');
    Route::get('search/brand/{id}','SearchController@brand')->where('id','[0-9]+');
    Route::get('nav/recommend','NavController@recommend');
    Route::get('collect/index','CollectController@index');
    Route::post('collect/add','CollectController@add');
    Route::post('collect/del','CollectController@del');
    Route::get('cart/index','CartController@index');
    Route::get('cart/myCart','CartController@myCart');
    Route::post('cart/bargain','CartController@bargain');
    Route::post('cart/del','CartController@delGoodsByCart');
    Route::get('foot/index','FootController@index');
    Route::post('foot/add','FootController@add');
    Route::post('foot/del','FootController@del');
    Route::get('foot/detail/{date}','FootController@detail');
    Route::get('login/index','LoginController@index');
    Route::post('login/index','LoginController@index');
    Route::get('login/captcha/{id}','LoginController@captcha')->where('id','[0-9]+');
    Route::get('login/register','LoginController@register');
    Route::post('login/register','LoginController@register');
    Route::get('member/index','MemberController@index');
    Route::get('member/show','MemberController@show');
    Route::get('member/changeInfo','MemberController@changeInfo');
    Route::post('member/changeInfo','MemberController@changeInfo');
    Route::get('member/safety','MemberController@safety');
    Route::get('member/setPay','MemberController@setPay');
    Route::post('member/setPay','MemberController@setPay');
    Route::get('member/changePay','MemberController@changePay');
    Route::post('member/changePay','MemberController@changePay');
    Route::get('member/changePwd','MemberController@changePwd');
    Route::post('member/changePwd','MemberController@changePwd');
    Route::get('site/index','SiteController@index');
    Route::get('site/edit','SiteController@edit');
    Route::post('site/edit','SiteController@edit');
    Route::get('money/index','MoneyController@index');
    Route::get('money/recharge','MoneyController@recharge');
    Route::post('money/recharge','MoneyController@recharge');
    Route::get('money/disburse/{id}','MoneyController@disburse')->where('id','[0-4]');
    Route::get('money/income/{id}','MoneyController@income')->where('id','[0-4]');
    Route::get('comment/index/{oid}/{gid}','CommentController@index')->where('oid','[0-9]+')->where('gid','[0-9]+');
    Route::post('comment/comment','CommentController@comment');
    Route::get('comment/reviews','CommentController@reviews');
    Route::get('message/index','MessageController@index');
    Route::get('message/detail/{id}','MessageController@detail')->where('id','[0-9]+');
    Route::post('message/operate','MessageController@operate');
    Route::post('message/del','MessageController@del');

    Route::get('site/roma','SiteController@roma');
    Route::get('site/totti','SiteController@totti');
});

Route::group(['namespace'=>'Admin'],function(){
    Route::get('admin','LoginController@index');
    Route::get('admin/login','LoginController@index');
    Route::get('admin/captcha/{id}','LoginController@captcha')->where('id','[0-9]+');

    Route::post('admin/create','LoginController@index');
    //Route::post('admin/create','LoginController@store');

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
    Route::get('admin/goods_index','GoodsController@index');
    Route::post('admin/goods_del','GoodsController@del');
    Route::post('admin/goods_operate','GoodsController@operate');
    Route::get('admin/goods_add','GoodsController@add');
    Route::post('admin/goods_add','GoodsController@add');
    Route::get('admin/goods_edit/{id}','GoodsController@edit')->where('id','[0-9]+');
    Route::post('admin/goods_edit/{id}','GoodsController@edit')->where('id','[0-9]+');
    Route::post('admin/goods_getCate','GoodsController@getCateByPid');
    Route::get('admin/goods_analyze','GoodsController@analyze');
    Route::post('admin/goods_analyze','GoodsController@analyze');
    Route::get('admin/member_index','MemberController@index');
    Route::post('admin/member_operate','MemberController@operate');
    Route::post('admin/member_del','MemberController@del');
    Route::get('admin/comment_index','CommentController@index');
    Route::get('admin/comment_comment/{id}','CommentController@comment')->where('id','[0-9]+');
    Route::get('admin/comment_response/{id}','CommentController@response')->where('id','[0-9]+');
    Route::get('admin/newperson_index','NewpersonController@index');
    Route::get('admin/newperson_add','NewpersonController@add');
    Route::post('admin/newperson_add','NewpersonController@add');
    Route::post('admin/newperson_addGoods','NewpersonController@addGoods');
    Route::post('admin/newperson_bargain','NewpersonController@bargain');
    Route::get('admin/newperson_exclusive','NewpersonController@exclusive');
    Route::post('admin/newperson_batch','NewpersonController@batch');
    Route::post('admin/newperson_reset','NewpersonController@reset');
    Route::post('admin/newperson_resetAll','NewpersonController@resetAll');
    Route::get('admin/active_index','ActiveController@index');
    Route::get('admin/active_add','ActiveController@add');
    Route::post('admin/active_add','ActiveController@add');
    Route::get('admin/active_edit/{id}','ActiveController@edit')->where('id','[0-9]+');
    Route::post('admin/active_del','ActiveController@del');
    Route::get('admin/advertise_index','AdvertiseController@index');
    Route::get('admin/advertise_add','AdvertiseController@add');
    Route::post('admin/advertise_add','AdvertiseController@add');
    Route::get('admin/advertise_edit/{id}','AdvertiseController@edit')->where('id','[0-9]+');
    Route::post('admin/advertise_edit/{id}','AdvertiseController@edit')->where('id','[0-9]+');
    Route::post('admin/advertise_operate','AdvertiseController@operate');
    Route::post('admin/advertise_del','AdvertiseController@del');
    Route::post('admin/advertise_out/{a}/{b}','AdvertiseController@out');
    Route::get('admin/integral_index','IntegralController@index');
    Route::get('admin/integral_add','IntegralController@add');
    Route::post('admin/integral_add','IntegralController@add');
    Route::get('admin/integral_edit/{id}','IntegralController@edit')->where('id','[0-9]+');
    Route::post('admin/integral_edit/{id}','IntegralController@edit')->where('id','[0-9]+');
    Route::post('admin/integral_operate','IntegralController@operate');
    Route::post('admin/integral_del','IntegralController@del');
    Route::get('admin/integral_trophy','IntegralController@trophy');
    Route::get('admin/integral_trophy_edit/{id}','IntegralController@edit_trophy')->where('id','[0-9]+');
    Route::post('admin/integral_trophy_edit/{id}','IntegralController@edit_trophy')->where('id','[0-9]+');
    Route::post('admin/integral_trophy_del','IntegralController@del_trophy');
    Route::post('admin/integral_getGoodsInfo','IntegralController@getGoodsInfo');
});

Auth::routes();
Route::group(['middleware'=>'auth'],function (){
    Route::get('auth/index','Auth\IndexController@index');
});


Route::get('/home', 'Wap\HomeController@index')->name('home');
Route::get('/roma', 'Wap\RomaController@index');
Route::get('/totti', 'Wap\RomaController@add');
Route::get('/spurs','Wap\SpursController@index');
Route::get('/nba','Wap\SpursController@nba');
Route::get('/nba_ball','Wap\SpursController@nba_ball');
Route::get('/queue','Wap\WelcomeController@index');



//社会化登录
Route::get('login/github', 'Wap\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Wap\LoginController@handleProviderCallback');



