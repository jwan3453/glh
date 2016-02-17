<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('auth/login','Auth\AuthController@getLogin');

Route::post('auth/login','Auth\AuthController@postLogin');

Route::get('auth/register','Auth\AuthController@getRegister');

Route::post('auth/register','Auth\AuthController@postRegister');

Route::get('auth/logout','Auth\AuthController@getLogout');

Route::get('hotel','Wechat\WechatController@showHotel');

Route::get('about','About\AboutController@about');
Route::get('joinUs','About\AboutController@joinUs');

Route::match(['get', 'post'], '/test', function () {
    return 'Hello World';
});

Route::any('/foo', function () {
    return 'Hello World1';
});

//Route::get('user/{id}', function($id){
//   return 'user' .$id;
//})->where('id', '[A-Za-z]+');;





Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function(){

    //用户注册表单检查路由
    Route::post('checkLoginName', 'CheckLoginController@checkLoginName');
    Route::post('checkMobile', 'CheckLoginController@checkMobile');
    Route::post('checkEmail', 'CheckLoginController@checkEmail');
    Route::post('checkPassword', 'CheckLoginController@checkPassword');
    Route::post('sendSmsCode','CheckLoginController@sendSmsCode');
    Route::post('checkSmsCode', 'CheckLoginController@checkSmsCode');

    //加载跟多文章
    Route::post('loadMoreArticle', 'CommonController@loadMoreArticle');
    Post('loadCityProvince', 'CommonController@loadCityProvince');

    //获得七牛token
//    Post('getQiniuToken','CommonController@getQiniuToken');
});

//测试路由
Route::get('testsession','Ajax\CheckLoginController@testsession');
Route::get('testgetsession','Ajax\CheckLoginController@getsession');

Route::get('testSMScode','Ajax\ChecKLoginController@sendSmsCode');


//博客路由
Route::group(['namespace' => 'Blog'],function(){
    Route::get('blog','BlogController@index');
    Route::get('blog/{slug}', 'BlogController@showPost');

});

Route::group(['namespace' => 'Blog', 'middleware' => 'auth'], function () {
    Route::post('admin/article/store','ArticleController@store');
    Route::resource('admin/article', 'ArticleController');
    Route::resource('admin/tag', 'TagController');
    get('admin/upload', 'UploadController@index');
});

Route::post('upload/image','Upload\UploadController@uploadImage');
Route::post('upload/images','Upload\UploadController@uploadImages');
Route::post('upload/deleteImage','Upload\UploadController@deleteImage');


//酒店管理路由
Route::group(['namespace' => 'Hotel', 'middleware' => 'auth'], function () {

    get('admin/hotel/create', 'HotelManagementController@create');
    post('admin/hotel/createNewHotel','HotelManagementController@createNewHotel');

    get('admin/hotel/photo/{id}', 'HotelManagementController@photo');
    post('admin/hotel/addPhoto','HotelManagementController@addPhoto');

    get('admin/hotel/standardSysRec', 'HotelStandardSysController@standardSysRec');
    get('admin/hotel/showStandardSysRec/{id}', 'HotelStandardSysController@showStandardSysRec');
    get('admin/hotel/createStandardSysRec', 'HotelStandardSysController@createStandardSysRec');
    get('admin/hotel/{id}/editStandardSysRec', 'HotelStandardSysController@editStandardSysRec');
    post('admin/hotel/newStandardSysRec','HotelStandardSysController@newStandardSysRec');
    post('admin/hotel/updateStandardSysRec','HotelStandardSysController@updateStandardSysRec');

});

//酒店预定
Route::group(['namespace' => 'Hotel', ], function () {

    get('admin/hotel/create', 'HotelManagementController@create');
    post('admin/hotel/createNewHotel','HotelManagementController@createNewHotel');

    get('admin/hotel/photo/{id}', 'HotelManagementController@photo');
    post('admin/hotel/addPhoto','HotelManagementController@addPhoto');

    get('admin/hotel/standardSysRec', 'HotelStandardSysController@standardSysRec');
    get('admin/hotel/showStandardSysRec/{id}', 'HotelStandardSysController@showStandardSysRec');
    get('admin/hotel/createStandardSysRec', 'HotelStandardSysController@createStandardSysRec');
    get('admin/hotel/{id}/editStandardSysRec', 'HotelStandardSysController@editStandardSysRec');
    post('admin/hotel/newStandardSysRec','HotelStandardSysController@newStandardSysRec');
    post('admin/hotel/updateStandardSysRec','HotelStandardSysController@updateStandardSysRec');

});

Route::get('hotel/{id}', ['uses' => 'Hotel\HotelOrderController@showHotel', 'as' => 'hotel.show']);