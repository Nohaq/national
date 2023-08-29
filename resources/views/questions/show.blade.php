@extends('questions.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Question Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Question content : {{ $question->content }}</h5>
                <p class="card-text">Reference : {{ $question->referenc }}</p>
                <p class="card-text">Subject : {{ $question->subject->subject_name }}</p>
                <p class="card-text">Term : {{ $question->term->term_name }}</p>
                <p class="card-text">Specialization : {{ $question->specialization->specialization_name }}</p>
                <p class="card-text">Collage : {{ $question->collage->collage_name }}</p>

            </div>

        </div>
        <a href="/questions">Go Back Home</a>
    </div>
