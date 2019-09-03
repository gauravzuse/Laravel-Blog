@extends('layouts.admin')

@section('title')
<h1>Create Post</h1>
@stop

@section('content')

<form method="POST" action="{{route('posts.store')}}" role="form" enctype="multipart/form-data">
    <!-- text input -->
    @csrf
    <div class="form-group col-md-8">
        <label>Title:</label>
        <input name="title" id="title" type="text" class="form-control" placeholder="Enter Title">
    </div>

    <div class="form-group col-md-8">
        <label for="category_id">Category:</label>
        <select class="form-control" name="category_id" id="category_id">
        <option>Choose Category</option>
        @foreach($categories as $id=>$category)
        <option value="{{$id}}">{{$category}}</option>
            @endforeach
           
        </select>
    </div>



    <div class="form-group col-md-8">
        <label>Photo:</label>
        <input type="file" name="photo_id" id="photo_id">
    </div>

    
    <div class="form-group col-md-8">
        <label>Content:</label>
        <textarea class="form-control" name="body" id="body" rows="8"></textarea>
    </div>









    <div class="form-group col-md-8">
        <button type="submit" name="submit" class="btn btn-primary">Create Post</button>
    </div>



</form>

@include('admin.includes.error')


@stop
