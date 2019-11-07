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
        <h3>New: Student Age-range by Class</h3><hr>
        {!! Form::open(['action' => 'MasterStudentageController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Class</label>
                <select id="class" name="class" class="form-control" required>
                    <option value=''>Select Class</option>
                    @foreach($sectors as $sector)
                        <option value="{{$sector->id}}">{{$sector->class}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('name','Age-range')}}
                {{Form::text('age','',['class'=>'form-control','placeholder'=>'Age-Range'])}}
            </div>

            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>