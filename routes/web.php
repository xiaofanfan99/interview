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
    return view('welcome');
});

/**
 * 篮球项目
 */
Route::prefix('live')->group(function () {
    route::get('index','Live\UserController@index');//篮球直播主页
    route::get('login','Live\UserController@login');//后台登录
    route::post('login_do','Live\UserController@login_do');//登录执行
    route::get('add_match','Live\UserController@add_match');//球赛添加
});

/**
 *发红包抢红包系统
 */
Route::prefix('red')->group(function (){
    route::get('index','RedEnvelopes\RedController@index');//红包主页面
});

/**
 * 2019-12-26新闻发布系统
 */
Route::prefix('news')->group(function (){
    route::get('login','News\IndexController@login');//登录
    route::post('login_do','News\IndexController@login_do');//登录执行

    Route::group(['middleware'=>'newslogin'],function (){
        route::get('index','News\IndexController@index');//新闻首页
        route::get('news_add','News\IndexController@news_add');//新闻添加
        route::post('news_add_do','News\IndexController@news_add_do');//新闻添加执行
        route::get('news_list','News\IndexController@news_list');//新闻添加
    });

});

/**
 * 面试系统
 */
Route::prefix('interview')->group(function (){
    route::get('admin_login','Interview\AdminController@admin_login');//后台登录
    route::post('admin_login_do','Interview\AdminController@admin_login_do');//后台登录执行
    Route::group(['middleware'=>'interviewlogin'],function (){
        route::get('admin','Interview\AdminController@admin');//后台首页
        route::get('add_user','Interview\AdminController@add_user');//管理员添加学生
        route::post('add_user_do','Interview\AdminController@add_user_do');//管理员添加学生
        route::get('user_list','Interview\AdminController@user_list');//学生列表
        route::get('interview_info','Interview\AdminController@interview_info');//学生面试信息
    });
//    前台
    route::get('index_login','Interview\IndexController@index_login');//前台登录
    route::post('index_login_do','Interview\IndexController@index_login_do');//前台登录执行
    route::group(['middleware'=>'inderxinterview'],function (){
        route::get('add_interview','Interview\IndexController@add_interview');//添加面试题
        route::post('add_interview_do','Interview\IndexController@add_interview_do');//添加面试题
        route::get('student_interview_info','Interview\IndexController@student_interview_info');//获取学生面试信息详情
        route::get('interview_del','Interview\IndexController@interview_del');//面试资料删除
    });
});
