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
        <h3>Edit Primary Focus</h3>
        {!! Form::open(['action' => ['PrimaryFocusController@update',$focus->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        {{Form::label('focus','Title of Primary Focus')}}<br/>
        {{Form::text('title',$focus->title,['class'=>'form-control','id'=>'title', 'placeholder' =>'Primary Focus'])}}
        {{Form::label('focus','Description of Primary Focus')}}<br/>
        <textarea rows="4", cols="54" class="form-control" id="des" name="des" style="resize:none, ">{{$focus->description}}</textarea>
        {{Form::label('focus','Estimated Budget')}}<br/>
        {{Form::text('budget',$focus->budget,['class'=>'form-control','id'=>'budget', 'placeholder' =>'Estimated Budget'])}}
        {{Form::label('focus','Completion Date')}}<br/>
        {{Form::date('date', $focus->complete_date, ['class'=>'form-control'])}}
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
        $("#budget").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });

    });
     
</script>