@extends('notifications.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Edit notification</div>
        <div class="card-body">

            <form action="{{ url('notifications/' .$notification->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$notification->id}}" id="id" />
                <label>Notification title</label></br>
                <input type="text" name="title" id="name" value="{{$notification->title}}" class="form-control"></br>
                <label>Content</label></br>
                <input type="text" name="content" id="name" value="{{$notification->content}}" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
