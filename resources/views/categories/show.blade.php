@extends('categories.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Category Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">category Name : {{ $category->category_name }}</h5>
                <p class="card-text">Logo : {{ $category->logo }}</p>
            </div>

        </div>
        <a href="/categories">Go Back Home</a>
    </div>
