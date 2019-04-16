@extends('main')


@section('content') 


<div class="col-md-6">
<h2 class="mb-4">{{$post->title}}</h2>
      </div>
   
    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">
        <div class="row">
          <img src="{{asset('storage/'.$post->image)}}" alt="Image placeholder">
        <p>{{$post->content}}</p>
          

              </div>
              <div style="margin-top:60px;">
              <p><a href="/comment-form/{{$post->id}}" class="btn btn-primary btn-sm rounded">Add Comment</a></p>

              <div>
                @foreach ($comments as $comment)
              <h3>{{$comment->user_id}}</h3>
              <p>{{$comment->comment}}</p>
              <p style="color:darkgray;font-size:13px;">{{$comment->created_at}}</p>
                @endforeach
                    
              
              </div>

              </div>


@endsection