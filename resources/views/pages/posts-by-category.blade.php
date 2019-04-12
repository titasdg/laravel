
@extends('main')


@section('content')

       
          <div class="row">
            <div class="col-md-6">
                <p><a href="/create-post" class="btn btn-primary btn-sm rounded">Create new post</a></p>
                <p><a href="/create-category" class="btn btn-primary btn-sm rounded">Create new category</a></p>
              <h2 class="mb-4">Latest Posts </h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
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
                    <p><a href="/update-post/{{$post->id}}">Edit</a></p>
                    </div>
                  </a>
                </div>
                @endforeach
                
            
              </div>

              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                   {{$posts->links()}}
                  </nav>
                </div>
              </div>


        
              
@endsection
              
 