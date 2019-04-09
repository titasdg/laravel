<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use File;
use Input;
class PostController extends Controller
{
    public function index(){
       // $posts=Post::all();//gaunu duomenis
        $posts=Post::paginate(8);
        return view('pages.home',compact('posts'));//siunciu i sablona
    }
    //public function {
       // $posts=Post::paginate(2);
    //}
    public function show_post(Post $post){
        return view('pages.show-post',compact('post'));
    }
    public function create_post(){
        return view('pages.create-post');
    }
    public function delete_validation(Post $post){
        return view('pages.delete-post',compact('post'));
    }
    public function update_post(Post $post){
        return view('pages.update-post',compact('post'));
    }
    public function store(Request $request){
        $validate=$request->validate([
            'title'=>'required|max:255',
            'about'=>'required|max:1100',
            'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000'

        ]);
            $path=$request->file('image')->store('public/logos');
            $filename=str_replace('public/',"",$path);

        $post= Post::create([
            'title' => request('title'),
            'content' => request('about'),
            'image' => $filename
        ]);

        return redirect('/');
       
    }
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
       return redirect('/');
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    public function search (){
        $input = Request::input('search');
        $input=Input::where();
        $post = Post::where('title','LIKE','%'.$input.'%')->get()->paginate(8);
        return view('pages.home',compact('posts'));//siunciu i sablona
    }
}
