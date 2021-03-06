<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use File;
use Illuminate\Support\Facades\Input;
use View;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(){
       // $posts=Post::all();//gaunu duomenis
      
        $posts=Post::paginate(8);
        return view('pages.home',compact(['posts']));//siunciu i sablona
    }
    //public function {
       // $posts=Post::paginate(2);
    //}
    public function show_post(Post $post){
        $comments = Comment::where('post_id','LIKE',$post->id)->get();
        //return view('pages.posts-by-category',compact('posts'));
        return view('pages.show-post',compact(['post','comments']));
        //return dd($comments);
    }


    public function create_post(){
        $category=Category::all();
        return view('pages.create-post',compact('category'));

    }
    public function delete_validation(Post $post){
        if(Gate::allows('edit-post',$post)){
        return view('pages.delete-post',compact('post'));
    }
    return redirect('/');
    }
    public function update_post(Post $post){
        if(Gate::allows('edit-post',$post)){

           return view('pages.update-post',compact('post')); 
        }
        return redirect('/');
    }
   /********************************************************************************************************** */
   public function store(Request $request){
       $validate=$request->validate([
           'title'=>'required|max:255',
           'about'=>'required|max:1100',
           'category_id'=>'required',
           'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000'
           
           ]);
           $path=$request->file('image')->store('public/logos');
           $filename=str_replace('public/',"",$path);
           
           $post= Post::create([
               'title' => request('title'),
               'content' => request('about'),
               'image' => $filename,
               'user_id' => auth()->user()->id,
               'likes' =>0,
               'category_id' => request('category_id')
               ]);
               
               return redirect('/home');
               
            }
            
   public function store_post_api(Request $request){
    $validate=$request->validate([
        'title'=>'required|max:255',
        'about'=>'required|max:1100',
        'category_id'=>'required',
        //'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000'
        
        ]);
        //$path=$request->file('image')->store('public/logos');
        //$filename=str_replace('public/',"",$path);
        
         Post::create([
            'title' => request('title'),
            'content' => request('about'),
            'image' => "asd",
            'user_id' =>1,
            'likes' =>0,
            'category_id' => request('category_id')
            ]);
            
            return response()->json([
                'message'=>"success"
            ]); 
            
         }
            /********************************************************************************************************** */
    public function store_update(Post $post,Request $request){
        $validate=$request->validate([
            'title'=>'required|max:255',
            'content'=>'required|max:1100',
            'image'=>'mimes:jpeg,jpg,png,gif|max:10000'

        ]);
       Post::where('id',$post->id)->update($request->only(['title','content']));
       
       if($request->hasFile('image'))
            {
                File::delete('storage/'.$post->image);
                $path=$request->file('image')->store('public/logos');
                $filename=str_replace('public/',"",$path);
                    Post::where('id',$post->id)->update([
                        'image' =>$filename
                     ]); 
            }
       return redirect('/home');
    }

    public function update_post_api(Request $request){
        /********   Not added photos    ******** */
        $validate=$request->validate([
            'title'=>'required|max:255',
            'content'=>'required|max:1100',
            //'image'=>'mimes:jpeg,jpg,png,gif|max:10000'

        ]);
       Post::where('id',$request->post_id)->update($request->only(['title','content']));
       
       /*if($request->hasFile('image'))
            {
                File::delete('storage/'.$post->image);
                $path=$request->file('image')->store('public/logos');
                $filename=str_replace('public/',"",$path);
                    Post::where('id',$post->id)->update([
                        'image' =>$filename
                     ]); 
            }*/
       
    }
    /*************************************************************** */
    public function delete(Post $post)
    {
        if(Gate::allows('edit-post',$post)){
            
            $post->delete();
            return redirect('/home');
        }
        return redirect('/');
        
    }
    public function delete_post_api($id)
    {
            Post::find($id)->delete();
            
    }
    /*************************************************************** */
    public function search (Request $request){
       
        $input = request::input('search');
        $posts = Post::where('title','LIKE','%'.$input.'%')->paginate(8);
        return view('pages.search',compact('posts'));//siunciu i sablona
        //return dd($input);
    }
    public function category ($id){
        
        $posts = Post::where('category_id','LIKE',$id)->paginate(8);
        return view('pages.posts-by-category',compact('posts'));
       
    }
}
