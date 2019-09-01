@extends('layouts.admin')

@section('title')
<h1>Create User</h1>
@stop

@section('content')

<form method="POST" action="{{route('users.store')}}" role="form" enctype="multipart/form-data">
    <!-- text input -->
    @csrf
    <div class="form-group col-md-8">
        <label>Name:</label>
        <input name="name" id ="name" type="text" class="form-control" placeholder="Enter Name">
    </div>


    <div class="form-group col-md-8">
        <label>Email:</label>
        <input name="email" id="email" type="email" class="form-control" placeholder="Enter Email">
    </div>
    <div class="form-group col-md-8">
        <label for="role_id">Role:</label>
        <select class="form-control" name="role_id" id="role_id">
            <option>Choose Options</option>
            @foreach($roles as $id => $role)
            <option value="{{$id}}">{{$role}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-8">
        <label for="is_active">Status:</label>
        <select class="form-control" name="is_active" id="is_active">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select>
    </div>

    <div class="form-group col-md-8">
        <label>Password:</label>
        <input name="password" id="password" type="password" class="form-control">
    </div>

    <div class="form-group col-md-8">
        <label>Profile Photo:</label>
        <input type="file" name="photo_id" id="photo_id">
    </div>

    



    <div class="form-group col-md-8">
        <button type="submit" name="submit" class="btn btn-primary">Create User</button>
    </div>



</form>

@include('admin.includes.error')


@stop