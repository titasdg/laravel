@extends('main')


@section('content') 




<div class="col-md-6">
        <h2 class="mb-4">Add comment</h2>
      </div>
   
    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">
        <div class="row">
        <form action="addcomment/{{$post->id}}" method="post" >
                    @csrf
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
                                <textarea rows="5" cols="70" type="text" name="comment" placeholder="Text"></textarea>
                            </fieldset>
                      
                      
                            <fieldset >
                            <button type = "submit" name="submit">Submit</button>
                            </fieldset>
                           
                        </form>
        </div>

       



@endsection