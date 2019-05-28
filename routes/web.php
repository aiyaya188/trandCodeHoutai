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
Route::any('admin', 'Admin\VideoController@index');//后台首页
Route::any('admin/video', 'Admin\VideoController@video')->name('admin/video');//视频管理列表
Route::any('admin/log', 'Admin\VideoController@log')->name('admin/log');//日志
Route::any('admin/system', 'Admin\VideoController@system')->name('admin/system');//系统设置
Route::any('admin/domain_name', 'Admin\VideoController@domain_name')->name('admin/domain_name');//系统设置
Route::any('admin/subtitle', 'Admin\VideoController@subtitle')->name('admin/subtitle');//字幕设置
Route::any('admin/watermark', 'Admin\VideoController@watermark')->name('admin/watermark');//水印设置
Route::any('admin/transcoding', 'Admin\VideoController@transcoding')->name('admin/transcoding');//转码设置
Route::get('admin/video/delete/{id}', 'Admin\VideoController@video_delete')->name('admin/video/delete');//视频删除
Route::get('admin/add_config', 'Admin\VideoController@add_config')->name('admin/add_config');//添加config
Route::get('admin/file_upload', 'Admin\VideoController@file_upload')->name('admin/file_upload');//文件上传
Route::any('admin/video_url', 'Admin\VideoController@video_url')->name('admin/video_url');//视频播放
//Route::any('admin/video_url/{url}', 'Admin\VideoController@video_url')->name('admin/video_url');//视频播放


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**********以下为转码相关路由*********/
Route::get('/test', 'T1Controller@test');
Route::get('/play', 'T1Controller@play');

Route::get('/water', 'WaterMarkController@startWaterMark');
Route::get('/caption', 'CaptionController@startCaption');
Route::get('/transform', 'TransformController@startTransform');