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
        <h3>Data Entry: Production of Livestock Products</h3><hr>
        {!! Form::open(['action' => 'LivestockProductionController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}">{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="">Animal Type</label>
                <select id="animal" name="animal" class="form-control" required>
                    <option value=''>Select</option>
                    @foreach($animal as $row)
                        <option value="{{$row->id}}">{{$row->products}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="color:coral">
                {{Form::label('total','Total (in National Standards for various product)')}}
                {{Form::text('total',0,['class'=>'form-control','id'=>'total', 'placeholder' =>'Total'])}}
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
        $("#total").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        
    });
     
</script>