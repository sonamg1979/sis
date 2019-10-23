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
        <h3>Add New History</h3><hr>
        {!! Form::open(['action' => 'HistoryController@store','method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Employee</label>
                <select id="employee_id" name="employee_id" class="form-control" required>
                    <option value=''>Select Employee</option>
                    @foreach($employee as $employees)
                        <option value="{{$employees->employee_id}}">{{$employees->employee_id. ' - '. $employees->employee_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('place','Place of Posting')}}
                {{Form::text('place','',['class'=>'form-control','placeholder'=>'Place of Posting'])}}
            </div>
            <div class="form-group">
                {{Form::label('job','Worked as')}}
                {{Form::text('job','',['class'=>'form-control','placeholder'=>'Designation then..'])}}
            </div>
            <div class="form-group">
                {{Form::label('from','Date From')}}
                {{Form::date('from',date('Y-m-d'),['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('to','Date To')}}
                {{Form::date('to',date('Y-m-d'),['class'=>'form-control'])}}
            </div>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
        {!! Form::close() !!}
@endsection