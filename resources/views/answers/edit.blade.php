@extends('answers.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Edit answer</div>
        <div class="card-body">

            <form action="{{ url('answers/' .$answer->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$answer->id}}" id="id" />
                <label>Question</label></br>
                <div class="col-md-6">
                                <label>

                                <select name="question_id" id="id">
                                        @foreach($questions as $question)
                                    <option  name="question_id" value="{{ $question->id }}" {{ $question->id == $answer->question_id ? 'selected' : ''  }}  >{{$question->content}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <label>Answer content</label></br>
                <input type="text" name="content" id="name" value="{{$answer->content}}" class="form-control"></br>
                <label>Is this the correct answer?</label>
                            <select name="istrue" id="istrue">
                             <option value="1" {{ $answer->istrue == 1 ? 'selected' : '' }}>True</option>
                             <option value="0" {{ $answer->istrue == 0 ? 'selected' : '' }}>False</option>
                            </select>
                            @if ($errors->has('istrue'))
                             <span class="text-danger">
                            {{ $errors->first('istrue') }}
                            </span>
                            @endif
                <input type="submit" value="Update" class="btn btn-success"></br>
                </form>
                
        </div>
    </div>

@stop
