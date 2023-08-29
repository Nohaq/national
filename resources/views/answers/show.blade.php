@extends('answers.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Answer Page</div>
        <div class="card-body">
            <div class="card-body">
            <h5 class="card-title">Question :  {{ $question->content }}</h5>
                <p class="card-text">The answer : {{ $answer->content }}    
                <h5 class="card-title"> {{ $answer->istrue ? 'True' : 'Fulse'  }}</h5></p>                         
            </div>

        </div>
        <a href="/answers">Go Back Home</a>
    </div>
