<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;

class ApiController extends Controller
{
    /****************************************** */
    public function get_all_categories(){

        return Category::all();
    }

    /********************************************* */
    public function get_all_posts(){

            return Post::all();  
    }

    /********************************************* */
    public function get_posts_by_id($id){

            return Post::find($id);        
    }
    /********************************************* */
    public function get_posts_by_category($category_id){

            return Post::where('category_id',$category_id)->get();    
    }

    /********************************************* */
    public function get_post_with_comments($id){
       
            $comments = Comment::where('post_id',$id)->select('comment','user_id','name')->get();
            $post = Post::find($id);
            return compact(['post','comments']);
    }    
    /********************************************* */
    public function add_like($id){

        $post_likes=Post::find($id);
        Post::where('id',$id)->update([
                'likes' =>$post_likes->likes+1
                ]);
    }
    /********************************************* */
}