@extends('layouts.admin')

@section('title')
<h1>Posts</h1>
@stop

@section('content')

<div class="col-md-10">

<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>

      @if($posts)
            @foreach($posts as $post)
      
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
        <td><img height="50" src="{{$post->photo ? $post->photo->file : 'https://via.placeholder.com/300'}}" alt=""></td>
        <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
        <td>{{str_limit($post->body,30)}}</td>
        
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
            @endforeach


        @endif
    </tbody>
  </table>
  </div>

@stop