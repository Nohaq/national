@extends('answers.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Answer</div>
        <div class="card-body">

            <form action="{{ url('answers') }}" method="post">
                {!! csrf_field() !!}
                <label>The question</label></br>
                <div class="col-md-6">
                                <label>
                                <select name="question_id" id="id">
                                        @foreach($questions as $question)
                                    <option  name="question_id" value="{{ $question->id }}" {{ $question->id == 2 ? 'selected' : ''  }}  >{{$question->content}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <label>Answer content</label></br>
                    <input type="text" name="content" id="name" class="form-control"></br>
                            <label>Is this the correct answer?</label>
                            <select name="istrue" id="istrue">
                             <option value="1">True</option>
                             <option value="0">False</option>
                            </select>
                            @if ($errors->has('istrue'))
                             <span class="text-danger">
                            {{ $errors->first('istrue') }}
                            </span>
@endif
                 <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
