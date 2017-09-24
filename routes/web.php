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

Route::group(['namespace' => 'App\Http\Controllers'], function() {

Route::get('/', function () {
    return view('welcome');
});
Route::resource('post','postController');
Route::resource('post/show','postController@show');
Route::get('post/{id}/edit', ['as' => 'post.edit', 'uses' => 'postController@edit']);
Route::get('post/{id}/delete', ['as' => 'post.delete', 'uses' => 'postController@delete']);

Route::post('post/update', 'postController@update' );


//Route::resource('post/{data}/show','postController@edit');     

});

