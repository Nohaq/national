@extends('notifications.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Notification</div>
        <div class="card-body">

            <form action="{{ url('notifications') }}" method="post">
                {!! csrf_field() !!}
                <label>New Notification</label></br>
                <input type="text" name="title" id="name" class="form-control"></br>
                <label>Content</label></br>
                <input type="text" name="content" id="name" class="form-control"></br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
