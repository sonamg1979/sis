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
        <h3>Add New: Cultural Heritage Information</h3><hr>
        {!! Form::open(['action' => 'CultureController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('culture','Name of Cultural Heritage')}}
                {{Form::text('sitename',null,['class'=>'form-control','id'=>'sitename', 'placeholder' =>'Name of Cultural Heritage'])}}
            </div>
            <div class="form-group">
                {{Form::label('culture','Location')}}
                {{Form::text('location',null,['class'=>'form-control','id'=>'location', 'placeholder' =>'Name of site Location'])}}
            </div>
            <div class="form-group">
                <label for="">Type of Cultural Heritage</label>
                <select id="type" name="type" class="form-control" required>
                    <option value=''>Type</option>
                    @foreach($types as $row)
                        <option value="{{$row->id}}">{{$row->heritage_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Year of Establishment</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-419; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}">{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <center><strong>{{Form::label('culture','Description of the site')}}</strong></center>
            <textarea rows="4", cols="54" class="form-control" id="des" name="des" style="resize:none, "></textarea>
            <br>
            <div class="form-group">
                {{Form::file('passport')}}
            </div>
            
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
        $("#hall").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#classroom").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
    })
     
</script>