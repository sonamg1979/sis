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
        <h3>Edit: Year & Financial Year</h3><hr>
        {!! Form::open(['action' => ['MasterYearController@update',$sectors->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                    {{Form::label('name','Year')}}
                    {{Form::text('year',$sectors->year,['class'=>'form-control','placeholder'=>'Year'])}}
                </div>
            <div class="form-group">
                {{Form::label('name','Financial Year')}}
                {{Form::text('f_year',$sectors->f_year,['class'=>'form-control','placeholder'=>'Financial Year'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>