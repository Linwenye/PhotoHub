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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//相册管理
Route::get('/{user}/album', 'AlbumController@show');
Route::post('/{user}/album/create', 'AlbumController@store');
Route::delete('/{user}/album/{album_id}', 'AlbumController@delete');

//照片管理
Route::get('/{user}/album/{album_id}', 'PhotoController@show');
Route::delete('/{user}/{photo_id)','PhotoController@delete');
Route::get('/{user}/upload_show', 'PhotoPostController@show');
Route::post('/{user}/upload', 'PhotoPostController@postUpload');
//Route::post('/{user}/crop', 'PhotoController@postCrop');

Route::get('/{user}/post_article', 'ArticlePostController@post');

// 朋友管理
Route::get('/{user}/friends', 'FriendController@show');
Route::delete('/{user}/delete_friend/{friend_id}', 'FriendController@delete');
Route::post('/{user}/add_friend/{friend_id}', 'FriendController@add');
Route::post('/{user}/search_friend', 'FriendController@search');

Route::get('/search', 'SearchController@show');
Route::post('/search_result', 'SearchController@search');

Route::get('/topics', 'ArticlePostController@show');
Route::post('/{user}/article/create', 'ArticlePostController@create');

Route::get('/admin','AdminController@show');
Route::delete('/admin/delete_usr/{id}','AdminController@destroy');