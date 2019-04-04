<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){
        $posts=Post::all();//gaunu duomenis

        return view('pages.home',compact('posts'));//siunciu i sablona
    }
    public function create_post(){
        return view('pages.create-post');
    }
    public function store(Request $request){
        $validate=$request->validate([
            'title'=>'required|max:255',
            'about'=>'required|max:1100'
        ]);
            
        $post= Post::create([
            'title' => request('title'),
            'content' => request('about')
        ]);

        return redirect('/');
    }
}
