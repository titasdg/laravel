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

Route::get('/', 'PostController@index');
Route::get('/create-post', 'PostController@create_post');
Route::post('/store', 'PostController@store');
Route::get('/post/{post}', 'PostController@show_post');
Route::get('/update-post/{post}', 'PostController@update_post');
Route::patch('/update-post/store-update/{post}', 'PostController@store_update');
Route::get('/delete-validation/{post}', 'PostController@delete_validation');
Route::get('/delete-validation/delete/{post}', 'PostController@delete');
Route::get('/search', 'PostController@search');

Route::get('/create-category', 'CategoriesController@create');
Route::post('/storeCategory', 'CategoriesController@storeCategory');
Route::get('/category/{id}', 'PostController@category');

Route::get('/comment-form/{post}', 'CommentController@add_comment');
Route::post('comment-form/addcomment/{post}', 'CommentController@addcomment');

