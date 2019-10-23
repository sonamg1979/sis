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
        <h3>Edit: General Information</h3><hr>
        {!! Form::open(['action' => ['AgriGeneralController@update',$infos->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}" {{($yr == $infos->year) ? 'selected' : '' }}>{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <center><strong>{{Form::label('staff','General Information')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('dry','Total Dry Land(Hectares)')}}
                    {{Form::text('dry',$infos->dry,['class'=>'form-control','id'=>'dry'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('wet','Total Wet Land(Hectares)')}}
                    {{Form::text('wet',$infos->wet,['class'=>'form-control','id'=>'wet'])}}
                </div> 
                <div class="form-group col-md-4">
                    {{Form::label('orchad','Total Orchard(Hectares)')}}
                    {{Form::text('orchad',$infos->orchad,['class'=>'form-control','id'=>'orchad'])}}
                </div>    
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-3">
                    {{Form::label('irrigation','Functional Irrigation Channel')}}
                    {{Form::text('f_irrigation',$infos->f_irrigation,['class'=>'form-control','id'=>'f_irrigation'])}}
                </div>
                <div class="form-group col-md-3">
                    {{Form::label('irrigation','Non-functional Irrigation Channel')}}
                    {{Form::text('n_irrigation',$infos->n_irrigation,['class'=>'form-control','id'=>'n_irrigation'])}}
                </div> 
                <div class="form-group col-md-3">
                    {{Form::label('irrigation','Total length of channels (km)')}}
                    {{Form::text('l_irrigation',$infos->l_irrigation,['class'=>'form-control','id'=>'l_irrigation'])}}
                </div>  
                <div class="form-group col-md-3">
                    {{Form::label('irrigation','Area covered by irrigation (acres)')}}
                    {{Form::text('area_irrigation',$infos->area_irrigation,['class'=>'form-control','id'=>'area_irrigation'])}}
                </div>  
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('irrigation','Households benefitted by irrigation')}}
                    {{Form::text('benefit_irrigation',$infos->benefit_irrigation,['class'=>'form-control','id'=>'benefit_irrigation'])}}
                </div>
                <div class="form-group col-md-3">
                    {{Form::label('processing','No. of food processing units')}}
                    {{Form::text('processing_unit',$infos->processing_unit,['class'=>'form-control','id'=>'processing_unit'])}}
                </div> 
                <div class="form-group col-md-3">
                    {{Form::label('mills','Number of agriculture mills')}}
                    {{Form::text('mills',$infos->mills,['class'=>'form-control','id'=>'mills'])}}
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