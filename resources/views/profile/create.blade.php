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
        <h3>Add New Employee</h3>
        {!! Form::open(['action' => 'ProfileController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('employee_id','Employee ID')}}
                {{Form::text('employee_id','',['class'=>'form-control','placeholder'=>'Employee id'])}}
            </div>
            <div class="form-group">
                {{Form::label('employee_name','Employee Name')}}
                {{Form::text('employee_name','',['class'=>'form-control','placeholder'=>'Employee Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('gender','Gender')}}<br/>
                {{Form::radio('sex', 'F', ['class'=>'form-control'])}} Female
                {{Form::radio('sex', 'M', ['class'=>'form-control'])}} Male 
            </div>
            <div class="form-group">
                {{Form::label('dob','Date of Birth')}}<br/>
                {{Form::date('dob', date('Y-m-d'), ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('citizen','Nationality')}}<br/>
                {{Form::radio('citizen', 'N', ['class'=>'form-control'])}} Non-Bhutanese
                {{Form::radio('citizen', 'B', ['class'=>'form-control'])}} Bhutanese 
                
            </div>
            <div class="form-group">
                {{Form::label('type','Employement Type')}}<br/>
                {{Form::radio('type', 'C', ['class'=>'form-control'])}} Contract
                {{Form::radio('type', 'R', ['class'=>'form-control'])}} Regular 
                
            </div>
            <div class="form-group">
                <label for="">Qualification</label>
                <select id="qualification" name="qualification" class="form-control" required>
                    <option value=''>Select Qualification</option>
                    @foreach($qualifications as $qualification)
                        <option value="{{$qualification->id}}">{{$qualification->qualification}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Designation</label>
                <select id="designation" name="designation" class="form-control" required>
                    <option value=''>Select Designation</option>
                    @foreach($designations as $designation)
                        <option value="{{$designation->id}}">{{$designation->designation}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('cid','CID Number')}}
                {{Form::text('cid','',['class'=>'form-control','placeholder'=>'CID number'])}}
            </div>
            <div class="form-group">
                {{Form::label('email','E-mail Address')}}
                {{Form::text('email','',['class'=>'form-control','placeholder'=>'abc@abc.com'])}}
            </div>
            <div class="form-group">
                {{Form::file('passport')}}
            </div>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
    {!! Form::close() !!}
@endsection