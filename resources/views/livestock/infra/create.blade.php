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
        <h3>New: Livestock infrastructure</h3><hr>
        {!! Form::open(['action' => 'LivestockInfraController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('ais','Artifical Insemination Center')}}
                {{Form::text('ais',0,['class'=>'form-control','id'=>'ais', 'placeholder' =>'ais'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('bio','Bio Gas')}}
                {{Form::text('biogas',0,['class'=>'form-control','id'=>'biogas', 'placeholder' =>'biogas'])}}
            </div>  
        </div>
        Poultry Farm
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-4">
                {{Form::label('total','Micro Farming')}}
                {{Form::text('poultry_micro',0,['class'=>'form-control','id'=>'poultry_micro', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('c_dry','Commercial Farming')}}
                {{Form::text('poultry_commercial',0,['class'=>'form-control','id'=>'poultry_commercial', 'placeholder' =>'cultivated'])}}
            </div>  
            <div class="form-group col-md-4">
                {{Form::label('c_dry','Broiler Farming')}}
                {{Form::text('poultry_broiler',0,['class'=>'form-control','id'=>'poultry_broiler', 'placeholder' =>'cultivated'])}}
            </div>
        </div>
        Diary Farming
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('total','Micro Farming')}}
                {{Form::text('diary_micro',0,['class'=>'form-control','id'=>'diary_micro', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_orchard','Commercial Farming')}}
                {{Form::text('diary_commercial',0,['class'=>'form-control','id'=>'diary_commercial', 'placeholder' =>'cultivated'])}}
            </div>  
        </div>
        <div class="form-row border" style="color:navy">
            <div class="form-group col-md-3">
                {{Form::label('total','Milk processing unit')}}
                {{Form::text('milk_processing',0,['class'=>'form-control','id'=>'milk_processing', 'placeholder' =>'total'])}}
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
        $("#ais").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#biogas").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#poultry_micro").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#poultry_commercial").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#poultry_broiler").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#diary_micro").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#diary_commercial").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#milk_processing").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        
    });
     
</script>