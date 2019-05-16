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
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=auth()->user()->id;
        $posts=Post::where('user_id','LIKE',$id)->get();
        return view('home',compact(['posts']));//siunciu i sablona
    }

    public function show_posts_dasboard(){
        // $posts=Post::all();//gaunu duomenis
     
     }
}
