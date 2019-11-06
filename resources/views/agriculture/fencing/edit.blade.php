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
        <h3>Edit: Land Holdings & Agriculture Facilites</h3><hr>
        {!! Form::open(['action' => ['ElectricFencingController@update',$infos->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <h4>Land Holdings in Acres</h4>
        <div class="form-group">
            <label for="">Year of Establishment</label>
            <select id="year" name="year" class="form-control" required>
                <option value=''>Year</option>
                @for($yr=now()->year-5; $yr<=now()->year; $yr++)
                <option value="{{$yr}}" {{($yr == $infos->year) ? 'selected' : '' }}>{{$yr}}</option>
                @endfor
            </select>
        </div>
        {{Form::label('total','Location')}}
        {{Form::text('location',$infos->location,['class'=>'form-control','id'=>'location', 'placeholder' =>'Location'])}}
        <br>
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('total','Length of Fencing')}}
                {{Form::text('length',$infos->length,['class'=>'form-control','id'=>'length', 'placeholder' =>'Length'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_wet','No. of Household Beneficiaries')}}
                {{Form::text('beneficiaries',$infos->beneficiaries,['class'=>'form-control','id'=>'beneficiaries', 'placeholder' =>'beneficiaries'])}}
            </div>  
        </div>
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('total','Total dry land')}}
                {{Form::text('dry',$infos->dry,['class'=>'form-control','id'=>'dry', 'placeholder' =>'total'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('c_dry','Total wet land')}}
                {{Form::text('wet',$infos->wet,['class'=>'form-control','id'=>'wet', 'placeholder' =>'cultivated'])}}
            </div>  
        </div>
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-6">
                {{Form::label('mode','Current Status')}}
                <select id="status" name="status" class="form-control" required>
                    <option value=''>Status</option>
                    @foreach($status as $data)
                        <option value="{{$data->id}}" {{($data->id == $infos->status) ? 'selected' : '' }}>{{$data->status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                {{Form::label('mode','Ownership Type')}}
                <select id="type" name="type" class="form-control" required>
                    <option value=''>Type</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{($type->id == $infos->type) ? 'selected' : '' }}>{{$type->type}}</option>
                    @endforeach
                </select>
            </div>  
        </div>
        <div class="form-row border">
            <div class="form-group col-md-12">
                <center><strong>{{Form::label('Remarks','Remarks')}}</strong></center>
            <textarea rows="4", cols="54" class="form-control" id="remarks" name="remarks" style="resize:none, ">{{$infos->remarks}}</textarea>                 
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