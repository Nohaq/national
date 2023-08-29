@extends('terms.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Edit Term</div>
        <div class="card-body">

            <form action="{{ url('terms/' .$term->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$term->id}}" id="id" />
                <label>Term name</label></br>
                <input type="text" name="term_name" id="name" value="{{$term->term_name}}" class="form-control"></br>
                <label>Type</label>
                            <select name="type" id="type">
                             <option value="graduate" {{ $term->type == 'graduate' ? 'selected' : '' }}>Graduate</option>
                             <option value="master" {{ $term->type == 'master' ? 'selected' : '' }}>Master</option>
                            </select></br></br>
                <label>Specialization </label></br>
                <div class="col-md-6">
                                <label>

                                <select name="specialization_id" id="id">
                                        @foreach($specializations as $specialization)
                                    <option  name="specialization_id" value="{{ $specialization->id }}" {{ $specialization->id == $term->specialization_id ? 'selected' : ''  }}  >{{$specialization->specialization_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div></br>
                <label>Collage </label></br>
                <div class="col-md-6">
                                <label>

                                <select name="collage_id" id="id">
                                        @foreach($collages as $collage)
                                    <option  name="collage_id" value="{{ $collage->id }}" {{ $collage->id == $term->collage_id ? 'selected' : ''  }}  >{{$collage->collage_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
