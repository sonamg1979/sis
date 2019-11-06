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
        <h3>New: Farmers group and Cooperatives</h3><hr>
        {!! Form::open(['action' => 'LivestockGroupController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Year of Establishment</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-5; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}">{{$yr}}</option>
                    @endfor
                </select>
            </div>
            {{Form::label('focus','Name of Farm Group/Cooperative')}}<br/>
            {{Form::text('title',null,['class'=>'form-control','id'=>'title', 'placeholder' =>'Group/Cooperative Name'])}}
            <br>
            <div class="form-group">
                {{Form::label('registration_number','Registration Number')}}
                {{Form::text('registration_number',null,['class'=>'form-control','id'=>'registration_number', 'placeholder' =>'Registration Number'])}}
            </div>
            Members
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('number','Male')}}
                    {{Form::text('male',0,['class'=>'form-control','id'=>'male', 'placeholder' =>'Members'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('number','Female')}}
                    {{Form::text('female',0,['class'=>'form-control','id'=>'female', 'placeholder' =>'Members'])}}
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