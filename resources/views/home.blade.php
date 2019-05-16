@extends('main')

@section('content')
<div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">
          <div class="row">
             
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header col-md-12">
                    <div class="col-md-12">
                        <div class="row">
                            <p class="col-md-3"><a href="/create-post" class="btn btn-primary btn-sm rounded ">Create new post</a></p>
                            <p class="col-md-3"><a href="/create-category" class="btn btn-primary btn-sm rounded">Create new category</a></p>
                            <h2 class="col-md-12">Your Latest Posts </h2>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                            @foreach ($posts as $post)
                            
                              <div class="col-md-6">
                              <a href="/post/{{$post->id}}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                              <img src="{{asset('storage/'.$post->image)}}" alt="Image placeholder">
                              
                                <div class="blog-content-body">
                                  <div class="post-meta">
                                    <span class="author mr-2"><img src="{!!asset('images/person_1.jpg')!!}" alt="Colorlib"> Colorlib</span>&bullet;
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                    
                                  </div>
                                <h2>{{Str::limit($post->title,20)}}</h2>
                               
                                    <p ><a href="/update-post/{{$post->id}}">Edit</a></p>
                                    <p ><a href="/delete-validation/{{$post->id}}">Delete</a></p> 
                               
                              
                                </div>
                              </a>
                            </div>
                            @endforeach
                            
                        
                          </div>
            
                          
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
