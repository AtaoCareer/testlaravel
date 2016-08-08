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
Route::get('test', 'TestController@test');


//-------------------------------------------------------------------------------------
//-----------------------------------正式路由----------------------------------------------
//---------------------------------------------------------------------------------------
Route::get('index/{id}', 'WechatController@index');//多用户的主文件入口

Route::get('user_index', function (){
	return view('zichans.user_index');
	//return view('welcome');
});
Route::get('user_index/{id}', function ($id){
	session(['id'=> $id]);
	return view('zichans.user_index');
});
Route::get('show', 'ZichanController@show');
Route::get('check', 'ZichanController@check');
Route::post('checkSave', 'ZichanController@checkSave');
Route::get('keshi/{bumen}', 'ZichanController@findKeshi');
Route::get('repair', 'ZichanController@repair');
Route::get('distribute', 'ZichanController@distribute');
Route::post('distributeSave', 'ZichanController@distributeSave');
Route::get('recover', 'ZichanController@recover');
//-----------------------------------------------------------------------------------
//------------------------------------用户分流路由----------------------------------------
//------------------------------------------------------------------------------------
Route::get('admin_index', function (){
	return view('zichans.admin_index');
});
	Route::get('admin_index/{id}', function ($id){
		session(['id'=>$id]);
		return view('zichans.admin_index');
	});
Route::get('getCode', 'WechatController@getCode');
Route::get('getCode/callback', 'Wechatcontroller@callback');


//以上通过获取openid的方法来判断是不是管理的方式已经成功