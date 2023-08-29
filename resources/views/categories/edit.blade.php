@extends('categories.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Edit category</div>
        <div class="card-body">

            <form action="{{ url('categories/' .$category->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$category->id}}" id="id" />
                <label>Category name: </label></br>
                <input type="text" name="category_name" id="name" value="{{$category->category_name}}" class="form-control"></br>
                <label>logo:</label></br>
                <input type="file" name="logo" id="name" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
