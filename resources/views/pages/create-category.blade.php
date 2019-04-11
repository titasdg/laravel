@extends('main')

@section('content') 

<div class="col-md-6">
        <h2 class="mb-4">Create new category</h2>
      </div>
   
    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">
        <div class="row">
                <form action="storeCategory" method="POST">
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
                                <input type="text" name="name" placeholder="Title">
                            </fieldset>
                            <fieldset >
                            <button type = "submit" name="submit">Submit</button>
                            </fieldset>
                           
                        </form>
        </div>

       
@endsection