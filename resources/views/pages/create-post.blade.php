@extends('main')


@section('content') 




<div class="col-md-6">
        <h2 class="mb-4">Create new post</h2>
      </div>
   
    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">
        <div class="row">
                <form action="store" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="title" placeholder="Title">
                            </fieldset>
                            <fieldset >
                                <textarea rows="5" cols="70" type="text" name="about" placeholder="Text"></textarea>
                            </fieldset>
                            <fieldset>
                                    <input type="file" name="image" >
                            </fieldset>
                            <fieldset>
                                    <select name="category_id">
                                        <option selected disabled>Select category</option>
                                        @foreach($category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                        </select>
                            </fieldset>
                            <fieldset >
                            <button type = "submit" name="submit">Submit</button>
                            </fieldset>
                           
                        </form>
        </div>

       



@endsection