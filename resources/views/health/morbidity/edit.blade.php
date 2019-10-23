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
        <h3>Edit: Morbidity Information</h3><hr>
        {!! Form::open(['action' => ['MorbidityController@update',$infos->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}" {{($yr == $infos->year) ? 'selected' : '' }}>{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="">Disease</label>
                <select id="type" name="type" class="form-control" required>
                    <option value=''>Select</option>
                    @foreach($type as $row)
                        <option value="{{$row->id}}" {{($row->id == $infos->morbidity) ? 'selected' : '' }}>{{$row->morbidity}}</option>
                    @endforeach
                </select>
            </div>
            <center><strong>{{Form::label('staff','The amount of disease within a population by gender')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('doctor','Male')}}
                    {{Form::text('male',$infos->male,['class'=>'form-control num1 key','id'=>'male'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('Drungtshos','Female')}}
                    {{Form::text('female',$infos->female,['class'=>'form-control num2 key','id'=>'female'])}}
                </div> 
                <div class="form-group col-md-4">
                    {{Form::label('Clinical Officers','Total')}}
                    {{Form::text('total',$infos->total,['class'=>'form-control sum key','id'=>'total','readonly'=>'true'])}}
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
        function calc(){
			var $num1=Number($(".num1").val());
			var $num2=Number($(".num2").val());
			$(".sum").val($num1+$num2);
		}
		$(".key").keyup(function(){
			calc();
		});
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
    })
     
</script>