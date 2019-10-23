@extends('layouts.admin-app')
@section('content')
    <hr>
    <h1>Edit Employee</h1>
    {!! Form::open(['action' => ['HistoryController@update',$historys->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            <label for="">Employee</label>
            <select id="employee_id" name="employee_id" class="form-control" required>
                <option value=''>Select Employee</option>
                @foreach($employee as $employees)
                    <option value="{{$employees->employee_id}}" {{($employees->employee_id == $historys->employee_id) ? 'selected' : '' }}>{{$employees->employee_id. ' - '. $employees->employee_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('place','Place of Posting')}}
            {{Form::text('place',$historys->place,['class'=>'form-control','placeholder'=>'Place of Posting'])}}
        </div>
        <div class="form-group">
            {{Form::label('job','Worked as')}}
            {{Form::text('job',$historys->job,['class'=>'form-control','placeholder'=>'Designation then..'])}}
        </div>
        <div class="form-group">
            {{Form::label('from','Date From')}}
            {{Form::date('from',$historys->from,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('to','Date To')}}
            {{Form::date('to',$historys->to,['class'=>'form-control'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
