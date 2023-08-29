@extends('terms.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Term Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Term Name : {{ $term->term_name }}</h5>
                <h5 class="card-title">Term Type : {{ $term->type }}</h5>
                <p class="card-text">Specialization : {{ $term->specialization->specialization_name }}</p>
                <p class="card-text">Collage : {{ $term->collage->collage_name }}</p>
            </div>

        </div>
        <a href="/terms">Go Back Home</a>
    </div>
