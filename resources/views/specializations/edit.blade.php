@extends('specializations.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Edit specialization</div>
        <div class="card-body">

            <form action="{{ url('specializations/' .$specialization->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$specialization->id}}" id="id" />
                <label>Specialization name</label></br>
                <input type="text" name="specialization_name" id="name" value="{{$specialization->specialization_name}}" class="form-control"></br>
                <label>Collage name</label></br>
                <div class="col-md-6">
                                <label>

                                <select name="collage_id" id="id">
                                        @foreach($collages as $collage)
                                    <option  name="collage_id" value="{{ $collage->id }}" {{ $collage->id == $specialization->collage_id ? 'selected' : ''  }}  >{{$collage->collage_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
