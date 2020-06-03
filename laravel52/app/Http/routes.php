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

Route::get('abc', function () {
    return "helloworld";
});

Route::post('abcd',function(){
    return "test";
});

Route::match(['get','post'],'aaa',function(){
    return "111";
});

Route::any('bbb',function(){
    return "111";
});

//必传路由参数
Route::any('ccc/{id}',function($id){
    return $id;
});

//可选路由参数
Route::any('cccd/{name?}',function($name=1){
    return $name;
});

//参数正则约束
Route::any('bbbc/{id}',function($id){
    return $id;
})->where('id','[0-9]+');

//路由群组
Route::group(['prefix'=>'nihao'],function(){
    Route::any('cccd/{name?}',function($name=1){
        return $name;
    });
    Route::any('bbb',function(){
        return "111";
    });
});

//控制器和路由关联
Route::any('hello/test/{aaa}','HelloController@test');

//输出视图
Route::any('hello/test1','HelloController@test1');
Route::any('hello/test2','HelloController@test2');
Route::any('hello/test3','HelloController@use_test3');
Route::any('hello/test4','HelloController@test4');
Route::any('hello/test5','HelloController@test5');
Route::any('hello/orm1','HelloController@orm1');
Route::any('hello/section1',['as'=>'hello/section1','uses'=>'HelloController@section1']);
Route::any('hello/request1',['uses'=>'HelloController@request1']);
Route::any('hello/request2',['uses'=>'HelloController@request2']);
Route::any('hello/response',['uses'=>'HelloController@response']);

Route::any('activity0',['uses'=>'HelloController@activity0']);

Route::group(['middleware'=>['activity']],function(){
    Route::any('activity1',['uses'=>'HelloController@activity1']);
    Route::any('activity2',['uses'=>'HelloController@activity2']);
});

//session路由群组
Route::group(['middleware'=>['web']],function(){
    Route::any('hello/session1',['uses'=>'HelloController@session1']);
    Route::any('hello/session2',['uses'=>'HelloController@session2']);
});

Route::any('index',['uses'=>'StudentController@index']);
Route::any('create',['uses'=>'StudentController@create']);
Route::any('update/{id}',['uses'=>'StudentController@update']);
Route::any('detail/{id}',['uses'=>'StudentController@detail']);
Route::any('del/{id}',['uses'=>'StudentController@del']);
//使用make:auth自动生成
Route::auth();

Route::get('/home', 'HomeController@index');
