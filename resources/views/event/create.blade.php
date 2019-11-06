@extends('layouts.admin-app')
@section('content')
<style>
    .card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */
    #errmsg
{
color: red;
}
}
</style>
    <div class="card card-body" style="max-width: 40rem;">
        <h3>New Important Events</h3><hr>
        {!! Form::open(['action' => 'EventsController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
        {{Form::label('focus','Year')}}<br/>    
        <select id="year" name="year" class="form-control" required>
            <option value=''>Year</option>
            @for($yr=now()->year+1; $yr>=now()->year; $yr--)
                <option value="{{$yr}}">{{$yr}}</option>
            @endfor
        </select>
            {{Form::label('focus','Events Title')}}<br/>
            {{Form::text('title',null,['class'=>'form-control','id'=>'title', 'placeholder' =>'Events'])}}
            {{Form::label('focus','Start Date')}}<br/>
            {{Form::date('sdate', date('Y-m-d'), ['class'=>'form-control'])}}
            {{Form::label('focus','End Date')}}<br/>
            {{Form::date('edate', date('Y-m-d'), ['class'=>'form-control'])}}
            <br>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
    {!! Form::close() !!}
@endsection