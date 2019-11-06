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
        <h3>Edit: Irrigation Channel Information</h3><hr>
        {!! Form::open(['action' => ['AgriGeneralController@update',$infos->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            <label for="">Construction Year</label>
            <select id="year" name="year" class="form-control" required>
                <option value=''>Year</option>
                @for($yr=now()->year-10; $yr<=now()->year; $yr++)
                <option value="{{$yr}}" {{($yr == $infos->year) ? 'selected' : '' }}>{{$yr}}</option>
                @endfor
            </select>
        </div>
        {{Form::label('location','Location of Channel')}}
        {{Form::text('location',$infos->location,['class'=>'form-control','id'=>'location', 'placeholder' =>'Location'])}}
        <center><strong>{{Form::label('staff','Chennel Information')}}</strong></center>
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-4">
                {{Form::label('length','Length of chennel(KM)')}}
                {{Form::text('length',$infos->length,['class'=>'form-control','id'=>'length', 'placeholder' =>'Length'])}}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('hh','Benefeciaries household(No.)')}}
                {{Form::text('hh',$infos->benefeciaries,['class'=>'form-control','id'=>'hh', 'placeholder' =>'Benefeciaries'])}}
            </div> 
            <div class="form-group col-md-4">
                {{Form::label('area','Command area (Acre)')}}
                {{Form::text('area',$infos->area,['class'=>'form-control','id'=>'area', 'placeholder' =>'Area'])}}
            </div>    
        </div> 
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-4">
                {{Form::label('mode','Mode of Construction')}}
                <select id="mode" name="mode" class="form-control" required>
                    <option value=''>Mode</option>
                    @foreach($modes as $mode)
                        <option value="{{$mode->id}}" {{($mode->id == $infos->construct_mode) ? 'selected' : '' }}>{{$mode->construct_mode}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                {{Form::label('type','Type of Construction')}}
                <select id="type" name="type" class="form-control" required>
                    <option value=''>Construct Type</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{($type->id == $infos->construct_type) ? 'selected' : '' }}>{{$type->construct_type}}</option>
                    @endforeach
                </select>
            </div> 
            <div class="form-group col-md-4">
                {{Form::label('chennel','Type of channels')}}
                <select id="ctype" name="ctype" class="form-control" required>
                    <option value=''>Chennel Type</option>
                    @foreach($ctypes as $row)
                    <option value="{{$row->id}}" {{($row->id == $infos->chennel_type) ? 'selected' : '' }}>{{$row->chennel_type}}</option>
                    @endforeach
                </select>
            </div>   
        </div> 
        <div class="form-row border" style="color:coral">
            <div class="form-group col-md-4">
                {{Form::label('association','Water user association')}}<br/>
                {{Form::radio('association', 'Y', $infos->associations == 'Y' ? 'selected' : '', ['class'=>'form-control-sm d-inline'])}} Yes 
                {{Form::radio('association', 'N', $infos->associations == 'N' ? 'selected' : '', ['class'=>'form-control-sm d-inline'])}} No
            </div> 
            <div class="form-group col-md-2">
                {{Form::label('male','Males')}}
                {{Form::text('male',$infos->male,['class'=>'form-control','id'=>'male', 'placeholder' =>'0'])}}
            </div> 
            <div class="form-group col-md-2">
                {{Form::label('female','Females')}}
                {{Form::text('female',$infos->female,['class'=>'form-control','id'=>'female', 'placeholder' =>'0'])}}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('status','Status of channel')}}
                <select id="status" name="status" class="form-control" required>
                    <option value=''>Status</option>
                        <option value="F" {{("F"== $infos->status) ? 'selected' : '' }}>Functional</option>
                        <option value="N" {{("N"== $infos->status) ? 'selected' : '' }}>Non-functional</option>
                </select>
            </div>
        </div>
        <div class="form-row border">
            <div class="form-group col-md-12">
                <center><strong>{{Form::label('Remarks','Remarks')}}</strong></center>
                <textarea rows="4", cols="54" class="form-control" id="remarks" name="remarks" style="resize:none, ">{{$infos->remarks}}</textarea>                 
            </div>
        </div>  
            {{Form::hidden('_method','PUT')}}
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
        $("#male").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#female").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#area").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#hh").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
    })
     
</script>