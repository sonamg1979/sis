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
        <h3>Site Visit Report</h3><hr>
        {!! Form::open(['action' => 'EngineerController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            <label for="">Activity</label>
            <select id="activity" name="activity" class="form-control" required>
                <option value=''>Select Activity</option>
                @foreach($activity as $data)
                    <option value="{{$data->id}}">{{ $data->activity}}</option>
                @endforeach
            </select>
        </div>
            {{Form::label('focus','Visit Date')}}<br/>
            {{Form::date('date', date('Y-m-d'), ['class'=>'form-control'])}}

            {{Form::label('focus','Observation and fund released')}}<br/>
            <textarea rows="4", cols="54" class="form-control" id="des" name="des" style="resize:none, "></textarea>
            <div class="form-group">
                <label for="">Status of Activity</label>
                <select id="status" name="status" class="form-control" required>
                    <option value=''>Select Status</option>
                    @foreach($status as $row)
                        <option value="{{$row->id}}">{{ $row->status}}</option>
                    @endforeach
                </select>
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