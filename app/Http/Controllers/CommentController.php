<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /***************************************************************************** */
    public function addcomment(Request $request)
    {
        $validate=$request->validate([
            
            'comment'=>'required|max:1100'
            ]);
            $comment= Comment::create([
                'name' => auth()->user()->name ,
                'user_id' => auth()->user()->id,
                'post_id' => $post->id,
                'comment' => request('comment'),
                
                
                ]);
                
                return redirect('/post/'.$post->id);
            }

            
            public function addcomment_api(Request $request)
            {
                $validate=$request->validate([
                    
                    'comment'=>'required|max:1100'
                    ]);
                    Comment::create([
                        'name' => $request->name,
                        'user_id' => 0,
                        'post_id' => $request->post_id,
                        'comment' => request('comment'),
                        
                        
                        ]);
                        
                       return response()->json([
                           'message'=>"success"
                       ]); 
                    }
            /***************************************************************************** */
    public function add_comment(Post $post)
    {
        if(Gate::allows('edit-post',$post)){
        return view('pages.add-comment',compact('post'));
        }
        
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
