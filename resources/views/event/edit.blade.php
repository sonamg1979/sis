@extends('layouts.admin-app')
@section('content')
<style>
    .card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */
}
</style>
    <div class="card card-body" style="max-width: 40rem;">
        <h3>Edit Events</h3>
        {!! Form::open(['action' => ['EventsController@update',$events->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            <label for="">Year</label>
            <select id="year" name="year" class="form-control" required>
                <option value=''>Year</option>
                @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                    <option value="{{$yr}}" {{($yr == $events->year) ? 'selected' : '' }}>{{$yr}}</option>
                @endfor
            </select>
        </div>
        {{Form::label('focus','Events Title')}}<br/>
            {{Form::text('title',$events->events,['class'=>'form-control','id'=>'title', 'placeholder' =>'Events'])}}
            {{Form::label('focus','Start Date')}}<br/>
            {{Form::date('sdate', $events->sdate, ['class'=>'form-control'])}}
            {{Form::label('focus','End Date')}}<br/>
            {{Form::date('edate', $events->edate, ['class'=>'form-control'])}}
        <br>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
    {!! Form::close() !!}
@endsection