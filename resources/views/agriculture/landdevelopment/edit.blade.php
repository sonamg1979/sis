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
        <h3>Edit: Land Development Plan</h3>
        {!! Form::open(['action' => ['LandDevelopmentController@update',$development->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            <label for="">Year</label>
            <select id="year" name="year" class="form-control" required>
                <option value=''>Year</option>
                @for($yr=now()->year-5; $yr<=now()->year; $yr++)
                <option value="{{$yr}}" {{($yr == $development->year) ? 'selected' : '' }}>{{$yr}}</option>
                @endfor
            </select>
        </div>
        {{Form::label('focus','Location of Land Development Plan')}}<br/>
        {{Form::text('location',$development->location,['class'=>'form-control','id'=>'location', 'placeholder' =>'Location Name'])}}
        <br><center>Type of Land (acres)</center>
        <div class="form-row border" style="color:navy">
            
            <div class="form-group col-md-6">
                {{Form::label('total','Dry')}}
                {{Form::text('dry',$development->dry,['class'=>'form-control','id'=>'dry', 'placeholder' =>'Dry'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_orchard','Wet')}}
                {{Form::text('wet',$development->wet,['class'=>'form-control','id'=>'wet', 'placeholder' =>'Wet'])}}
            </div> 
        </div>
        <div class="form-row border">
            <div class="form-group col-md-12">
                <center><strong>{{Form::label('Remarks','Remarks')}}</strong></center>
            <textarea rows="4", cols="54" class="form-control" id="remarks" name="remarks" style="resize:none, ">{{$development->remarks}}</textarea>                 
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
        $("#number").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });

    });
     
</script>