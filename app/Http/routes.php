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

// index
Route::get("/index", "IndexController@index");
Route::get("index/get_menu", "IndexController@get_menu");

// articles
Route::get("/article", "ArticleController@get_list");
Route::get("/articles/{id}", "ArticleController@get");

// todo 跳转
Route::get('/', function () {
    return view('index');
});

// 路由接控制器
Route::get("/about/{id}", "AboutRoute@getAbout");

// 路由接控制器，RESTful
Route::resource('/resource', "MyResource");


// project
Route::get("aboutme", "AboutRoute@aboutme");

// rest 导航
Route::resource("/title", "TitleIndex");

// 参数验证
Route::get("edit", "EditController@postdata");

Route::get("login", "AdminController@login_page");
