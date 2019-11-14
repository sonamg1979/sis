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
        <h3>New Electric/solar fencing</h3><hr>
        {!! Form::open(['action' => 'ElectricFencingController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            <label for="">Year of Establishment</label>
            <select id="year" name="year" class="form-control" required>
                <option value=''>Year</option>
                @for($yr=now()->year-5; $yr<=now()->year; $yr++)
                    <option value="{{$yr}}">{{$yr}}</option>
                @endfor
            </select>
        </div>
        {{Form::label('total','Location')}}
        {{Form::text('location',null,['class'=>'form-control','id'=>'location', 'placeholder' =>'Location','required'=>'required'])}}
        <br>
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('total','Length of Fencing (in km)')}}
                {{Form::number('length',0,['class'=>'form-control','id'=>'length', 'placeholder' =>'Length'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_wet','No. of Household Beneficiaries')}}
                {{Form::number('beneficiaries',0,['class'=>'form-control','id'=>'beneficiaries', 'placeholder' =>'beneficiaries'])}}
            </div>  
        </div>
         <center><strong>{{Form::label('total','Electric Fencing Area Coverage')}}</strong></center>
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('total','Total dry land')}}
                {{Form::text('dry',0,['class'=>'form-control','id'=>'dry', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_dry','Total wet land')}}
                {{Form::text('wet',0,['class'=>'form-control','id'=>'wet', 'placeholder' =>'cultivated'])}}
            </div>  
        </div>
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('mode','Current Status')}}
                <select id="status" name="status" class="form-control" required>
                    <option value=''>Status</option>
                    @foreach($status as $data)
                        <option value="{{$data->id}}">{{$data->status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                {{Form::label('mode','Ownership Type')}}
                <select id="type" name="type" class="form-control" required>
                    <option value=''>Type</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
            </div>  
        </div>
        <div class="form-row border">
            <div class="form-group col-md-12">
                <center><strong>{{Form::label('Remarks','Remarks')}}</strong></center>
                <textarea rows="4", cols="54" class="form-control" id="remarks" name="remarks" style="resize:none, "></textarea>                 
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