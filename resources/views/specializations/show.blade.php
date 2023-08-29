@extends('specializations.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Specialization Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Specialization Name : {{ $specialization->specialization_name }}</h5>
                <p class="card-text">collage : {{ $collage->collage_name }}</p>
            </div>

        </div>
        <a href="/specializations">Go Back Home</a>
    </div>
