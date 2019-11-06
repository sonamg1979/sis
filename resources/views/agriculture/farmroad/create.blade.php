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
        <h3>Add: Farm road details</h3><hr>
        {!! Form::open(['action' => 'FarmRoadController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Construction Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-10; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}">{{$yr}}</option>
                    @endfor
                </select>
            </div>
            {{Form::label('location','Farm Road Name')}}
            {{Form::text('road_name',null,['class'=>'form-control','id'=>'road_name', 'placeholder' =>'Name of the Road'])}}
            <br>
            {{Form::label('location','Chiwog')}}
            {{Form::text('chiwog',null,['class'=>'form-control','id'=>'chiwog', 'placeholder' =>'Chiwog Name'])}}
            <br>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-6">
                    {{Form::label('length','Length of road(KM)')}}
                    {{Form::text('length',0,['class'=>'form-control','id'=>'length', 'placeholder' =>'Length'])}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('beneficiaries','Benefeciaries household(No.)')}}
                    {{Form::text('beneficiaries',0,['class'=>'form-control','id'=>'beneficiaries', 'placeholder' =>'Benefeciaries'])}}
                </div>    
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-6">
                    {{Form::label('mode','Mode of Construction')}}
                    <select id="mode" name="mode" class="form-control" required>
                        <option value=''>Mode</option>
                        @foreach($modes as $mode)
                            <option value="{{$mode->id}}">{{$mode->construct_mode}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('type','Type of Construction')}}
                    <select id="type" name="type" class="form-control" required>
                        <option value=''>Construct Type</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->construct_type}}</option>
                        @endforeach
                    </select>
                </div>    
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('group','Road user group')}}<br/>
                    {{Form::radio('group', 'Y', ['class'=>'form-control'])}} Yes
                    {{Form::radio('group', 'N', ['class'=>'form-control','selected'])}} No 
                </div> 
                <div class="form-group col-md-2">
                    {{Form::label('male','Males')}}
                    {{Form::text('male',0,['class'=>'form-control','id'=>'male', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-2">
                    {{Form::label('female','Females')}}
                    {{Form::text('female',0,['class'=>'form-control','id'=>'female', 'placeholder' =>'0'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('status','Status of channel')}}
                    <select id="status" name="status" class="form-control" required>
                        <option value=''>Status</option>
                            <option value="C">Completed</option>
                            <option value="N">Incomplete</option>
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