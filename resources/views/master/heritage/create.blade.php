@extends('layouts.super-app')
@section('content')
<style>
    .card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */
}
</style>
    <div class="card card-body" style="max-width: 40rem;">
        <h3>New: Heritage Type</h3><hr>
        {!! Form::open(['action' => 'MasterHeritageController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                {{Form::label('name','Type')}}
                {{Form::text('heritage_type','',['class'=>'form-control','placeholder'=>'Heritage Type'])}}
            </div>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {

    });

    
</script>