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


@endsection