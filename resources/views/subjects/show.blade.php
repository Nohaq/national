@extends('subjects.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">subject Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Subject Name : {{ $subject->subject_name }}</h5>
                <p class="card-text">collage : {{ $collage->collage_name }}</p>
            </div>

        </div>
        <a href="/subjects">Go Back Home</a>
    </div>
