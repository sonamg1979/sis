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
        <h3>Edit Site Visit</h3>
        {!! Form::open(['action' => ['EngineerController@update',$sitevisit->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
                <label for="">Activity</label>
                <select id="activity" name="activity" class="form-control" required>
                    <option value=''>Select Activity</option>
                    @foreach($activity as $data)
                        <option value="{{$data->id}}" {{($data->id == $sitevisit->activity) ? 'selected' : '' }}>{{$data->activity}}</option>
                    @endforeach
                </select>
            </div>
                {{Form::label('focus','Visit Date')}}<br/>
                {{Form::date('date', $sitevisit->visit_date, ['class'=>'form-control'])}}
    
                {{Form::label('focus','Observation and fund released')}}<br/>
                <textarea rows="4", cols="54" class="form-control" id="des" name="des" style="resize:none, ">{{$sitevisit->observation}}</textarea>
                <div class="form-group">
                    <label for="">Status of Activity</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value=''>Select Status</option>
                        @foreach($status as $row)
                            <option value="{{$row->id}}" {{($row->id == $sitevisit->status) ? 'selected' : '' }}>{{$row->status}}</option>
                        @endforeach
                    </select>
                </div>
            
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