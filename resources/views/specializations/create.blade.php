@extends('specializations.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Create New specialization</div>
        <div class="card-body">

            <form action="{{ url('specializations') }}" method="post">
                {!! csrf_field() !!}
                <label>Specialization name</label></br>
                <input type="text" name="specialization_name" id="name" class="form-control"></br>
                <label>Collage name</label></br>
                <div class="col-md-6">
                                <label>

                                <select name="collage_id" id="id">
                                        @foreach($collages as $collage)
                                    <option  name="collage_id" value="{{ $collage->id }}" {{ $collage->id == 2 ? 'selected' : ''  }}  >{{$collage->collage_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
