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
        <h3>Edit: Student Information</h3><hr>
        {!! Form::open(['action' => ['SchoolInfraController@update',$schoolinfos->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('school','School Name')}}
                {{Form::text('schoolname',$schoolinfos->schoolname,['class'=>'form-control','id'=>'schoolname', 'placeholder' =>'School Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('school','Location')}}
                {{Form::text('location',$schoolinfos->location,['class'=>'form-control','id'=>'location', 'placeholder' =>'Name of School Location'])}}
            </div>
            <div class="form-group">
                <label for="">School Level</label>
                <select id="level" name="level" class="form-control" required>
                    <option value=''>School Level</option>
                    @foreach($levels as $row)
                        <option value="{{$row->id}}" {{($row->id == $schoolinfos->schoollevel) ? 'selected' : '' }}>{{$row->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Year of Establishment</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-50; $yr<=now()->year; $yr++)
                    <option value="{{$yr}}" {{($yr == $schoolinfos->estdyear) ? 'selected' : '' }}>{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <center><strong>{{Form::label('school','Infrastructure')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('school','Area')}}
                    {{Form::text('area',$schoolinfos->area,['class'=>'form-control','id'=>'area', 'placeholder' =>'Total area of campus', 'required'=>'required'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('school','Multipurpose Hall')}}
                    {{Form::text('hall',$schoolinfos->hall,['class'=>'form-control','id'=>'hall', 'placeholder' =>'No. of Multipurpose Hall', 'required'=>'required'])}}
                </div>  
                <div class="form-group col-md-4">
                    {{Form::label('school','Class')}}
                    {{Form::text('classroom',$schoolinfos->classroom,['class'=>'form-control','id'=>'classroom', 'placeholder' =>'Total classrooms', 'required'=>'required'])}}
                </div>
            </div> 
            <center><strong>{{Form::label('school','Sport Facilities')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('school','Football Ground')}}
                    <select id="football" name="football" class="form-control" required>
                        <option value=''>Select</option>
                        <option value='Y' {{($schoolinfos->football=='Y') ? 'selected' : '' }}>Yes</option>
                        <option value='N' {{($schoolinfos->football=='N') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('school','Volleyball Ground')}}
                    <select id="volleyball" name="volleyball" class="form-control" required>
                        <option value=''>Select</option>
                        <option value='Y' {{($schoolinfos->volleyball=='Y') ? 'selected' : '' }}>Yes</option>
                        <option value='N' {{($schoolinfos->volleyball=='N') ? 'selected' : '' }}>No</option>
                    </select>
                </div> 
                <div class="form-group col-md-4">
                    {{Form::label('school','Basketball')}}
                    <select id="basketball" name="basketball" class="form-control" required>
                        <option value=''>Select</option>
                        <option value='Y' {{($schoolinfos->basketball=='Y') ? 'selected' : '' }}>Yes</option>
                        <option value='N' {{($schoolinfos->basketball=='N') ? 'selected' : '' }}>No</option>
                    </select>
                </div>  
            </div>
            <div class="form-group">
            <center><strong>{{ Form::label('indoor', 'List of Indoor games facilities') }}</strong></center>
            {{ Form::textarea('indoor',$schoolinfos->indoor , array('class'=>'form-control','required'=>'required','rows'=>'5')) }}
            </div>
    
            <br>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
    {!! Form::close() !!}
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //called when key is pressed in textbox
        $("#hall").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#classroom").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
    })
     
</script>