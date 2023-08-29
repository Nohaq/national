@extends('terms.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Term</div>
        <div class="card-body">

            <form action="{{ url('terms') }}" method="post">
                {!! csrf_field() !!}
                <label>Term name</label></br>
                <input type="text" name="term_name" id="name" class="form-control"></br>
                <label>Type</label></br>
                <select name="type" id="type">
                             <option value="graduate">Graduate</option>
                             <option value="master">Mater</option>
                            </select></br></br>
                <label>Specialization</label></br>
                <div class="col-md-6">
                                <label>

                                <select name="specialization_id" id="id">
                                        @foreach($specializations as $specialization)
                                    <option  name="specialization_id" value="{{ $specialization->id }}" {{ $specialization->id == 2 ? 'selected' : ''  }}  >{{$specialization->specialization_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div></br>
                            <label>Collage</label></br>
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
