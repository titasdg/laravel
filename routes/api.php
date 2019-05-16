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
Route::get('/post',function(){
return Post::all();

});
Route::get('/category',function(){
    return Category::all();
    
    });
Route::get('/post/{id}',function($id){
return Post::find($id);
});
Route::get('/post-by-category/{category_id}',function($category_id){
    return Post::where('category_id',$category_id)->get();
    });

Route::get('/post-comments/{id}',function($id){
    
    $comments = Comment::where('post_id',$id)->select('comment','user_id')->get();
    $post = Post::find($id);

    return compact(['post','comments']);
  
    });



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
