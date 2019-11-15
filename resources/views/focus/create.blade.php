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
        <h3>New Primary Focus of the Sector</h3><hr>
        {!! Form::open(['action' => 'PrimaryFocusController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
    
            {{Form::label('focus','Title of Primary Focus of the Sector')}}<br/>
            {{Form::text('title',null,['class'=>'form-control','id'=>'title', 'placeholder' =>'Primary Focus'])}}
            {{Form::label('focus','Description of Primary Focus')}}<br/>
            <textarea rows="4", cols="54" class="form-control" id="des" name="des" style="resize:none, "></textarea>
            {{Form::label('focus','Estimated Budget (in million)')}}<br/>
            {{Form::text('budget',0,['class'=>'form-control','id'=>'budget', 'placeholder' =>'Estimated Budget if any'])}}
            {{Form::label('focus','Completion Date')}}<br/>
            {{Form::date('date', date('Y-m-d'), ['class'=>'form-control'])}}
            <br>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
    {!! Form::close() !!}
@endsection
<!-- <script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function () {
        //called when key is pressed in textbox
        $("#budget").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
    });
     
</script> -->