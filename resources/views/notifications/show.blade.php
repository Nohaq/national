@extends('notifications.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Notifications Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Notification Title : {{ $notification->title }}</h5>
                <p class="card-text">Content : {{ $notification->content }}</p>
            </div>

        </div>
        <a href="/notifications">Go Back Home</a>
    </div>
