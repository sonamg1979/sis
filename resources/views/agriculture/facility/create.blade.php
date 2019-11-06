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
        <h3>New Land Holdings & Agriculture Facilites</h3><hr>
        {!! Form::open(['action' => 'AgriFacilityController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <h4>Land Holdings in Acres</h4>
        Wet Land
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('total','Total')}}
                {{Form::text('wet',0,['class'=>'form-control','id'=>'wet', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_wet','Land Cultivated')}}
                {{Form::text('c_wet',0,['class'=>'form-control','id'=>'c_wet', 'placeholder' =>'cultivated'])}}
            </div>  
        </div>
        Dry Land
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('total','Total')}}
                {{Form::text('dry',0,['class'=>'form-control','id'=>'dry', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_dry','Land Cultivated')}}
                {{Form::text('c_dry',0,['class'=>'form-control','id'=>'c_dry', 'placeholder' =>'cultivated'])}}
            </div>  
        </div>
        Orchard (if any...)
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('total','Total')}}
                {{Form::text('orchard',0,['class'=>'form-control','id'=>'orchard', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_orchard','Land Cultivated')}}
                {{Form::text('c_orchard',0,['class'=>'form-control','id'=>'c_orchard', 'placeholder' =>'cultivated'])}}
            </div>  
        </div>
        <h4>Facilities</h4>
        <div class="form-row border" style="color:navy">
            <div class="form-group col-md-3">
                {{Form::label('total','Food pro. unit')}}
                {{Form::text('food_processing',0,['class'=>'form-control','id'=>'food_processing', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-3">
                {{Form::label('c_orchard','Rice & flour Mill')}}
                {{Form::text('mills',0,['class'=>'form-control','id'=>'mills', 'placeholder' =>'cultivated'])}}
            </div> 
            <div class="form-group col-md-3">
                {{Form::label('total','Traditional Mill')}}
                {{Form::text('tradition_mills',0,['class'=>'form-control','id'=>'tradition_mills', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-3">
                {{Form::label('c_orchard','Oil Expeller')}}
                {{Form::text('oil_expeller',0,['class'=>'form-control','id'=>'oil_expeller', 'placeholder' =>'cultivated'])}}
            </div>  
        </div>
        <div class="form-row border" style="color:navy">
            <div class="form-group col-md-3">
                {{Form::label('total','Corn Flake')}}
                {{Form::text('corn_flake',0,['class'=>'form-control','id'=>'corn_flake', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-3">
                {{Form::label('c_orchard','Electric Dryer')}}
                {{Form::text('electric_dryer',0,['class'=>'form-control','id'=>'electric_dryer', 'placeholder' =>'cultivated'])}}
            </div> 
            <div class="form-group col-md-3">
                {{Form::label('c_orchard','Potatoe deep Fryer')}}
                {{Form::text('potatoe_fryer',0,['class'=>'form-control','id'=>'potatoe_fryer', 'placeholder' =>'cultivated'])}}
            </div>
            <div class="form-group col-md-3">
                {{Form::label('total','Power Tiller')}}
                {{Form::text('power_tiller',0,['class'=>'form-control','id'=>'power_tiller', 'placeholder' =>'total'])}}
            </div>  
        </div>
        <div class="form-row border" style="color:navy">
            <div class="form-group col-md-3">
                {{Form::label('total','Tractor')}}
                {{Form::text('tractor',0,['class'=>'form-control','id'=>'tractor', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-3">
                {{Form::label('c_orchard','Transplanter')}}
                {{Form::text('transplanter',0,['class'=>'form-control','id'=>'transplanter', 'placeholder' =>'cultivated'])}}
            </div> 
            <div class="form-group col-md-3">
                {{Form::label('c_orchard','Grass Cutter')}}
                {{Form::text('grass_cutter',0,['class'=>'form-control','id'=>'grass_cutter', 'placeholder' =>'cultivated'])}}
            </div>
            <div class="form-group col-md-3">
                {{Form::label('total','Greenhouse')}}
                {{Form::text('green_house',0,['class'=>'form-control','id'=>'green_house', 'placeholder' =>'total'])}}
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
        $("#wet").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#c_wet").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#dry").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#c_dry").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#orchard").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#c_orchard").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#food_processing").keypress(function (e) {
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
        $("#tradition_mills").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#oil_expeller").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#corn_flake").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#electric_dryer").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#potatoe_fryer").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#tractor").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#transplanter").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#grass_cutter").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#green_house").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#power_tiller").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
    });
     
</script>