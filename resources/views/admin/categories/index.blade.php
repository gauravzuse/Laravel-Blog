@extends('layouts.admin')

@section('title')
<h1>Categories</h1>
@stop

@section('content')

<div class="col-md-4">


    <form method="POST" action="{{route('categories.store')}}" role="form">
        <!-- text input -->
        @csrf
        <div class="form-group col-md-8">
            <label>Category Name:</label>
            <input name="name" id="name" type="text" class="form-control" placeholder="Enter Category">
        </div>
        <div class="form-group col-md-8">
            <button type="submit" name="submit" class="btn btn-primary">Create Category</button>
        </div>



    </form>


</div>

<div class="col-md-6">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>

                <th>Category Name</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>

            @if($categories)
            @foreach($categories as $category)

            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>

                    <form method="POST" action="{{route('categories.destroy',$category->id)}}">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <input type="submit" name="Delete" class="btn btn-danger" value="Delete">
                        </div>
                    </form>



                </td>

                <td>

<form method="POST" action="{{route('categories.update',$category->id)}}">
    @csrf
   @method('PATCH')
    <div class="form-group">
        <input type="submit" name="update" class="btn btn-primary" value="Update">
    </div>
</form>



</td>
            </tr>
            @endforeach


            @endif
        </tbody>
    </table>
</div>

@stop
