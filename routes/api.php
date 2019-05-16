<?php

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/post','ApiController@get_all_posts');

Route::get('/category','ApiController@get_all_categories');

Route::get('/post/{id}','ApiController@get_posts_by_id');


Route::get('/post-by-category/{category_id}','ApiController@get_posts_by_category');

Route::get('/post-comments/{id}','ApiController@get_post_with_comments');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
