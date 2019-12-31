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
    <h3>Edit Employee</h3>
    <hr>
    {!! Form::open(['action' => ['ProfileController@update',$profiles->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('employee_id','Employee ID')}}
            {{Form::text('employee_id',$profiles->employee_id,['class'=>'form-control','placeholder'=>'Employee id'])}}
        </div>
        <div class="form-group">
            {{Form::label('employee_name','Employee Name')}}
            {{Form::text('employee_name',$profiles->employee_name,['class'=>'form-control','placeholder'=>'Employee Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('gender','Gender')}}<br/>
            {{Form::radio('sex', 'M', $profiles->sex == 'M' ? 'selected' : '', ['class'=>'form-control-sm d-inline'])}} Male 
            {{Form::radio('sex', 'F', $profiles->sex == 'F' ? 'selected' : '', ['class'=>'form-control-sm d-inline'])}} Female
        </div>
        <div class="form-group">
            {{Form::label('dob','Date of Birth')}}<br/>
            {{Form::date('dob', $profiles->dob, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('citizen','Nationality')}}<br/>
            {{Form::radio('citizen', 'N', $profiles->citizen == 'N' ? 'selected' : '', ['class'=>'form-control-sm d-inline'])}} Non-Bhutanese 
            {{Form::radio('citizen', 'B', $profiles->citizen == 'B' ? 'selected' : '', ['class'=>'form-control-sm d-inline'])}} Bhutanese
        </div>
        <div class="form-group">
            {{Form::label('type','Employement Type')}}<br/>
            {{Form::radio('type', 'C', $profiles->type == 'C' ? 'selected' : '', ['class'=>'form-control-sm d-inline'])}} Contract 
            {{Form::radio('type', 'R', $profiles->type == 'R' ? 'selected' : '', ['class'=>'form-control-sm d-inline'])}} Regular
        </div>
        <div class="form-group">
                <label for="">Qualification</label>
                <select id="qualification" name="qualification" class="form-control" required>
                    <option value='{{$profiles->qualification}}'>Select qualification</option>
                    @foreach($qualifications as $qualification)
                        <option value="{{$qualification->id}}">{{$qualification->qualification}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Designation</label>
                <select id="designation" name="designation" class="form-control" required>
                    <option value='{{$profiles->designation}}'>Select Designation</option>
                    @foreach($designations as $designation)
                        <option value="{{$designation->id}}">{{$designation->designation}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            {{Form::label('cid','CID Number')}}
            {{Form::text('cid',$profiles->cid_number,['class'=>'form-control','placeholder'=>'CID number'])}}
        </div>
        <div class="form-group">
            {{Form::label('email','E-mail Address')}}
            {{Form::text('email',$profiles->email,['class'=>'form-control','placeholder'=>'abc@abc.com'])}}
        </div>
        <div class="form-group">
            <input type="file" name="image" />
            <img src="{{ URL::to('/') }}/storage/images/{{ $profiles->photo }}" class="img-thumbnail" width="100" />
            <input type="hidden" name="hidden_image" value="{{ $profiles->photo }}" />
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
