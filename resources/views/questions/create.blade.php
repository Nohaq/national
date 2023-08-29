@extends('questions.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Question</div>
        <div class="card-body">

            <form action="{{ url('questions') }}" method="post">
                {!! csrf_field() !!}
                <label>Question Content</label></br>
                <input type="text" name="content" id="name" class="form-control"></br>
                <label>Question Reference</label></br>
                <input type="text" name="referenc" id="name" class="form-control"></br>

                <label>Subject : </label> 
                <div class="col-md-6">
                                <label>

                                <select name="subject_id" id="id">
                                        @foreach($subjects as $subject)
                                    <option  name="subject_id" value="{{ $subject->id }}" {{ $subject->id == 1 ? 'selected' : ''  }}  >{{$subject->subject_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <label>Term : </label> 
                <div class="col-md-6">
                                <label>

                                <select name="subject_id" id="id">
                                        @foreach($terms as $term)
                                    <option  name="term_id" value="{{ $term->id }}" {{ $term->id == 1 ? 'selected' : ''  }}  >{{$term->term_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <label>Specialization : </label> 
                <div class="col-md-6">
                                <label>

                                <select name="specialization_id" id="id">
                                        @foreach($specializations as $specialization)
                                    <option  name="specialization_id" value="{{ $specialization->id }}" {{ $specialization->id == 1 ? 'selected' : ''  }}  >{{$specialization->specialization_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <label>Collage : </label> 
                <div class="col-md-6">
                                <label>

                                <select name="collage_id" id="id">
                                        @foreach($collages as $collage)
                                    <option  name="collage_id" value="{{ $collage->id }}" {{ $collage->id == 1 ? 'selected' : ''  }}  >{{$collage->collage_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
