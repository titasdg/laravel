@extends('main')


@section('content') 


<div class="col-md-6">
    <h2>Ar tikrai norite istrinti ?</h2>
<h4 class="mb-4">{{$post->title}}</h4>
      </div>
   
    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">
        <div class="row">
            
        <p><a href="delete/{{$post->id}}" class="btn btn-primary btn-sm rounded">Yes</a>   <a href="/update-post/{{$post->id}}" class="btn btn-primary btn-sm rounded">No</a></p>
          

              </div>


@endsection