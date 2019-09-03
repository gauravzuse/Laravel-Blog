@extends('layouts.admin')

@section('title')
<h1>Edit User</h1>
@stop

@section('content')



<div class="col-sm-3">


<img src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/150'}}" alt="No Profile Photo" class="img-responsive img-rounded">

</div>
<div class="col-sm-9">



<form  method="POST" action="{{route('users.update',$user->id)}}" role="form" enctype="multipart/form-data">
    <!-- text input -->
    @csrf
    @method('PATCH')
    <div class="form-group col-md-8">
        <label>Name:</label>
        <input value="{{$user->name}}" name="name" id ="name" type="text" class="form-control" placeholder="Enter Name">
    </div>


    <div class="form-group col-md-8">
        <label>Email:</label>
        <input value="{{$user->email}}" name="email" id="email" type="email" class="form-control" placeholder="Enter Email">
    </div>
    <div class="form-group col-md-8">
        <label for="role_id">Role:</label>
        <select class="form-control" name="role_id" id="role_id">
           
              
  @foreach ($roles as $id => $role)
    <option value="{{ $id }}" {{ ( $id == $user->role->id) ? 'selected' : '' }}> 
        {{ $role }} 
    </option>
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
        <button type="submit" name="submit" class="btn btn-primary">Submit to Edit</button>
    </div>



</form>


<form method="POST" action="{{route('users.destroy',$user->id)}}">
@csrf
@method('DELETE')
<div class="form-group col-md-4">
<input type="submit" name="Delete" class="btn btn-danger" value="Delete User">
</div>
</form>
</div>
@include('admin.includes.error')


@stop