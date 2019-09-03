@extends('layouts.admin')

@section('title')
<h1>Users</h1>
@stop

@section('content')
<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>

      @if($users)
            @foreach($users as $user)
      
      <tr>
        <td>{{$user->id}}</td>
        <td><img height="50" src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/300'}}" alt=""></td>
        <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
        <td>{{$user->is_active==1 ? 'Active': 'Not Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
            @endforeach


        @endif
    </tbody>
  </table>
@stop