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
        <h3>Edit: Farmers' Group/Association/Cooperative</h3>
        {!! Form::open(['action' => ['FarmGroupController@update',$groups->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        {{Form::label('groups','Name of Farm Group/Association/Cooperative')}}<br/>
        {{Form::text('title',$groups->group_name,['class'=>'form-control','id'=>'title', 'placeholder' =>'Group/Association/Cooperative'])}}
        <div class="form-group">
            <label for="">Year of Establishment</label>
            <select id="year" name="year" class="form-control" required>
                <option value=''>Year</option>
                @for($yr=now()->year-5; $yr<=now()->year; $yr++)
                    <option value="{{$yr}}" {{($yr == $groups->year) ? 'selected' : '' }}>{{$yr}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            {{Form::label('number','Number of Members')}}
            {{Form::text('number',$groups->number,['class'=>'form-control','id'=>'number', 'placeholder' =>'Members'])}}
        </div>
        <div class="form-group">
            {{Form::label('registration_number','Number of Members')}}
            {{Form::text('registration_number',$groups->registration_number,['class'=>'form-control','id'=>'registration_number', 'placeholder' =>'Registration Number'])}}
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