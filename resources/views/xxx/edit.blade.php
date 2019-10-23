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
        <h3>Edit: Student Information</h3><hr>
        {!! Form::open(['action' => ['SchoolStudentInfoController@update',$studentinfos->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}" {{($yr == $studentinfos->year) ? 'selected' : '' }}>{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="">Class</label>
                <select id="class" name="class" class="form-control" required>
                    <option value=''>Class</option>
                    @foreach($class as $row)
                        <option value="{{$row->id}}" {{($row->id == $studentinfos->class) ? 'selected' : '' }}>{{$row->class}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Age Group</label>
                <select id="group" name="group" class="form-control" required>
                    <option value=''>Select Class first</option>
                    @foreach($age as $row1)
                        <option value="{{$row1->id}}" {{($row1->id == $studentinfos->agerange) ? 'selected' : '' }}>{{$row1->age}}</option>
                    @endforeach
                </select>
            </div>
            <center><strong>{{Form::label('staff','Number of Students')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-6">
                    {{Form::label('staff','Male')}}
                    {{Form::text('male',$studentinfos->male,['class'=>'form-control','id'=>'male', 'placeholder' =>'Total Male'])}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('staff','Female')}}
                    {{Form::text('female',$studentinfos->female,['class'=>'form-control','id'=>'female', 'placeholder' =>'Total Female'])}}
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
        $("#female").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#male").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
            }
        });
        $("#class").on('change',function(e){
            console.log(e);
            var id = e.target.value;
            $.get('/json-group?group=' + id, function(data){
                console.log(data);
                $('#group').empty();
                $('#group').append('<option value="">Select Age-group</option>');
                $.each(data, function(index, agegroupObj){
                    $('#group').append('<option value="'+ agegroupObj.id +'">'+ agegroupObj.age + '</option>');
                })
            });

        });
    })
     
</script>