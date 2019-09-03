@extends('layouts.admin')

@section('title')
<h1>Edit Post</h1>
@stop

@section('content')

<form method="POST" action="{{route('posts.update',$post->id)}}" role="form" enctype="multipart/form-data">
    <!-- text input -->
    @csrf
    @method('PATCH')
    <div class="form-group col-md-8">
        <label>Title:</label>
        <input value="{{$post->title}}" name="title" id ="title" type="text" class="form-control" placeholder="Enter Title">
    </div>

    <div class="form-group col-md-8">
        <label for="category_id">Category:</label>
        <select class="form-control" name="category_id" id="category_id">

              @foreach ($categories as $id => $category)
    <option value="{{ $id }}" {{ ( $id == $post->category_id) ? 'selected' : '' }}> 
        {{ $category }} 
    </option>
  @endforeach 
           
        </select>
    </div>



    <div class="form-group col-md-8">
        <label>Photo:</label>
        <input type="file" name="photo" id="photo">
        <br>
        <div class="col-md-6">
        <img class="img-responsive img-rounded" src="{{$post->photo->file}}" alt="">
        </div>
    </div>

    
    <div class="form-group col-md-8">
        <label>Content:</label>
        <textarea class="form-control" name="body" id="body" rows="8">{{$post->body}}</textarea>
    </div>

    



    <div class="form-group col-md-8">
        <button type="submit" name="submit" class="btn btn-primary">Update Post</button>
    </div>



</form>


<form method="POST" action="{{route('posts.destroy',$post->id)}}">
@csrf
@method('DELETE')
<div class="form-group col-md-4">
<input type="submit" name="Delete" class="btn btn-danger" value="Delete Post">
</div>
</form>

@include('admin.includes.error')


@stop