@extends('categories.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Category</div>
        <div class="card-body">

            <form action="{{ url('categories') }}" method="post">
                {!! csrf_field() !!}
                <label>New Category</label></br>
                <input type="text" name="category_name" id="name" class="form-control"></br>
                <label>Logo</label></br>
                <input type="file" name="logo" id="name" class="form-control"></br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
