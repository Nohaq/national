@extends('questions.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Edit Question</div>
        <div class="card-body">

            <form action="{{ url('questions/' .$question->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$question->id}}" id="id" />
                <label>Question content</label></br>
                <input type="text" name="content" id="name" value="{{$question->content}}" class="form-control"></br>
                <label>reference : </label>                
                <input type="text" name="referenc" id="name" value="{{$question->referenc}}" class="form-control"></br>
                <label>Subject : </label> 
                <div class="col-md-6">
                                <label>

                                <select name="subject_id" id="id">
                                        @foreach($subjects as $subject)
                                    <option  name="subject_id" value="{{ $subject->id }}" {{ $subject->id == $question->subject_id ? 'selected' : ''  }}  >{{$subject->subject_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <label>Term : </label> 
                <div class="col-md-6">
                                <label>

                                <select name="subject_id" id="id">
                                        @foreach($terms as $term)
                                    <option  name="term_id" value="{{ $term->id }}" {{ $term->id == $question->term_id ? 'selected' : ''  }}  >{{$term->term_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <label>Specialization : </label> 
                <div class="col-md-6">
                                <label>

                                <select name="specialization_id" id="id">
                                        @foreach($specializations as $specialization)
                                    <option  name="specialization_id" value="{{ $specialization->id }}" {{ $specialization->id == $question->specialization_id ? 'selected' : ''  }}  >{{$specialization->specialization_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <label>Collage : </label> 
                <div class="col-md-6">
                                <label>

                                <select name="collage_id" id="id">
                                        @foreach($collages as $collage)
                                    <option  name="collage_id" value="{{ $collage->id }}" {{ $collage->id == $question->collage_id ? 'selected' : ''  }}  >{{$collage->collage_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
