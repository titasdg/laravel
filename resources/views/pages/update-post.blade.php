@extends('main')


@section('content') 


<div class="col-md-6">
<p><a href="/delete-validation/{{$post->id}}" class="btn btn-primary btn-sm rounded">Delete this post</a></p>
<h2 class="mb-4">{{$post->title}}</h2>

      </div>
   
    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">
        <div class="row">
       
        <form action="store-update/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                <fieldset >
                <input type="text" name="title" placeholder="Title" value="{{$post->title}}">
                    </fieldset>
                    <fieldset >
                    <textarea rows="5" cols="70" type="text" name="content" placeholder="Text">{{$post->content}}</textarea>
                    </fieldset>
                    <img src="{{asset('storage/'.$post->image)}}" alt="Image placeholder">
                    <fieldset>
                            <input type="file" name="image">
                    </fieldset>
                    <fieldset >
                    <button type = "submit" name="submitUpdate">Submit</button>
                    </fieldset>
                   
                </form>




              </div>


@endsection