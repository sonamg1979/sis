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
        <h3>Edit Staff Information</h3>
        {!! Form::open(['action' => ['SchoolStaffInfoController@update',$schoolinfos->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}" {{($yr == $schoolinfos->year) ? 'selected' : '' }}>{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <center><strong>{{Form::label('staff','Teaching Staff')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-6">
                    {{Form::label('staff','Male')}}
                    {{Form::text('tmale',$schoolinfos->tmale,['class'=>'form-control','id'=>'male', 'placeholder' =>'Total Male','required'=>'required'])}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('staff','Female')}}
                    {{Form::text('tfemale',$schoolinfos->tfemale,['class'=>'form-control','id'=>'female', 'placeholder' =>'Total Female','required'=>'required'])}}
                </div>  
            </div> 
            <center><strong>{{Form::label('staff','Contract Teacher')}}</strong></center>
            <div class="form-row border">
                <div class="form-group col-md-6">
                    {{Form::label('staff','Male')}}
                    {{Form::text('cmale',$schoolinfos->cmale,['class'=>'form-control','id'=>'male', 'placeholder' =>'Total Male','required'=>'required'])}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('staff','Female')}}
                    {{Form::text('cfemale',$schoolinfos->cfemale,['class'=>'form-control','id'=>'female', 'placeholder' =>'Total Female','required'=>'required'])}}
                </div>  
            </div>  
            <center><strong>{{Form::label('staff','Non-Teaching Staff')}}</strong></center>
            <div class="form-row border">
                <div class="form-group col-md-6">
                    {{Form::label('staff','Male')}}
                    {{Form::text('smale',$schoolinfos->smale,['class'=>'form-control','id'=>'male', 'placeholder' =>'Total Male','required'=>'required'])}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('staff','Female')}}
                    {{Form::text('sfemale',$schoolinfos->sfemale,['class'=>'form-control','id'=>'female', 'placeholder' =>'Total Female','required'=>'required'])}}
                </div>  
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
        $("#tfemale").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#tmale").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#cfemale").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#cmale").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#sfemale").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#smale").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
    });
     
</script>