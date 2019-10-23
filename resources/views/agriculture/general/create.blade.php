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
        <h3>Data Entry: General Information</h3><hr>
        {!! Form::open(['action' => 'AgriGeneralController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}">{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <center><strong>{{Form::label('staff','General Information')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('dry','Total Dry Land(Hectares)')}}
                    {{Form::text('dry',0,['class'=>'form-control','id'=>'dry', 'placeholder' =>'0'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('wet','Total Wet Land(Hectares)')}}
                    {{Form::text('wet',0,['class'=>'form-control','id'=>'wet', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-4">
                    {{Form::label('orchad','Total Orchard(Hectares)')}}
                    {{Form::text('orchad',0,['class'=>'form-control','id'=>'orchad', 'placeholder' =>'0'])}}
                </div>    
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-3">
                    {{Form::label('irrigation','Functional Irrigation Channel')}}
                    {{Form::text('f_irrigation',0,['class'=>'form-control','id'=>'f_irrigation', 'placeholder' =>'0'])}}
                </div>
                <div class="form-group col-md-3">
                    {{Form::label('irrigation','Non-functional Irrigation Channel')}}
                    {{Form::text('n_irrigation',0,['class'=>'form-control','id'=>'n_irrigation', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-3">
                    {{Form::label('irrigation','Total length of channels (km)')}}
                    {{Form::text('l_irrigation',0,['class'=>'form-control','id'=>'l_irrigation', 'placeholder' =>'0'])}}
                </div>  
                <div class="form-group col-md-3">
                    {{Form::label('irrigation','Area covered by irrigation (acres)')}}
                    {{Form::text('area_irrigation',0,['class'=>'form-control','id'=>'area_irrigation', 'placeholder' =>'0'])}}
                </div>  
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('irrigation','Households benefitted by irrigation')}}
                    {{Form::text('benefit_irrigation',0,['class'=>'form-control','id'=>'benefit_irrigation', 'placeholder' =>'0'])}}
                </div>
                <div class="form-group col-md-3">
                    {{Form::label('processing','No. of food processing units')}}
                    {{Form::text('processing_unit',0,['class'=>'form-control','id'=>'processing_unit', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-3">
                    {{Form::label('mills','Number of agriculture mills')}}
                    {{Form::text('mills',0,['class'=>'form-control','id'=>'mills', 'placeholder' =>'0'])}}
                </div>                  
            </div> 
            <br>
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

        $("#f_irrigation").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#n_irrigation").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#benefit_irrigation").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#processing_unit").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#mills").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });

    })
     
</script>