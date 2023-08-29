<html>
<head>
    <title>All Questions</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="m-3 text-center">All Questions</h1>
    <table class="table table-bordered mb-3">
        <thead>
        <tr>
            <div class="card">
                                <div class="card-body">
                                    <a href="{{ url('/questions/create') }}" class="btn btn-success btn-sm" title="Add New Subject">
                                        Add New
                                    </a>
                                </div>
            </div>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><h5 class="card-title">Question Content : </h5></td>
                <td><h5 class="card-title">Reference : </h5></td>
                <td><h5 class="card-title">Subject : </h5></td>
                <td><h5 class="card-title">Term : </h5></td>
                <td><h5 class="card-title">Specilization : </h5></td>
                <td><h5 class="card-title">Collage : </h5></td>

                <td></td>
            </tr>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->content }}</td>
                <td>{{ $question->referenc }}</td>
                <td><p class="card-text"> {{ $question->subject->subject_name }}</p></td>                
                <td><p class="card-text"> {{ $question->term->term_name }}</p></td>                
                <td><p class="card-text"> {{ $question->specialization->specialization_name }}</p></td>                
                <td><p class="card-text"> {{ $question->collage->collage_name }}</p></td>                
                <td>
                <a href="{{ url('/questions/' . $question->id) }}" title="View question"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                <a href="{{ url('/questions/' . $question->id . '/edit') }}" title="Edit question"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>


                        <form method="POST" action="{{ route('questions.destroy', $question->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                        </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').click(function(e) {
            if(!confirm('Are you sure you want to delete this subject?')) {
                e.preventDefault();
            }
        });
    });
</script>
</body>
</html>
{{--@endsection--}}
