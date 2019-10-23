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
        <h3>Data Entry: General Information</h3><hr>
        {!! Form::open(['action' => 'GeneralHealthController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
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
                <label for="">Type of Facilities</label>
                <select id="type" name="type" class="form-control" required>
                    <option value=''>Type of Facilities</option>
                    @foreach($type as $row)
                        <option value="{{$row->id}}">{{$row->type}}</option>
                    @endforeach
                </select>
            </div>
            <center><strong>{{Form::label('staff','Health Personnel Information')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-3">
                    {{Form::label('doctor','Doctor')}}
                    {{Form::text('doctor',0,['class'=>'form-control','id'=>'doctors', 'placeholder' =>'0'])}}
                </div>
                <div class="form-group col-md-3">
                    {{Form::label('Drungtshos','Drungtsho')}}
                    {{Form::text('drungtshos',0,['class'=>'form-control','id'=>'drungtshos', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-3">
                    {{Form::label('Clinical Officers','Clinical Officer')}}
                    {{Form::text('clinicalcfficers',0,['class'=>'form-control','id'=>'clinicalcfficers', 'placeholder' =>'0'])}}
                </div>  
                <div class="form-group col-md-3">
                    {{Form::label('asstClinical Officers','Asst. Clinical Officer')}}
                    {{Form::text('assclinicalcfficers',0,['class'=>'form-control','id'=>'assclinicalcfficers', 'placeholder' =>'0'])}}
                </div>  
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-3">
                    {{Form::label('ha','Health Assistance')}}
                    {{Form::text('ha',0,['class'=>'form-control','id'=>'ha', 'placeholder' =>'0'])}}
                </div>
                <div class="form-group col-md-3">
                    {{Form::label('bhw','Basic Health Worker')}}
                    {{Form::text('bhw',0,['class'=>'form-control','id'=>'bhw', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-3">
                    {{Form::label('physiotherapists','Physiotherapists')}}
                    {{Form::text('physiotherapists',0,['class'=>'form-control','id'=>'physiotherapists', 'placeholder' =>'0'])}}
                </div>  
                <div class="form-group col-md-3">
                    {{Form::label('nurses','Nurses')}}
                    {{Form::text('nurses',0,['class'=>'form-control','id'=>'nurses', 'placeholder' =>'0'])}}
                </div>  
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-3">
                    {{Form::label('sowamenpas','Sowa Menpas')}}
                    {{Form::text('sowamenpas',0,['class'=>'form-control','id'=>'sowamenpas', 'placeholder' =>'0'])}}
                </div>
                <div class="form-group col-md-3">
                    {{Form::label('pharmacists','Pharmacists')}}
                    {{Form::text('pharmacists',0,['class'=>'form-control','id'=>'pharmacists', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-3">
                    {{Form::label('technicians','Technicians')}}
                    {{Form::text('technicians',0,['class'=>'form-control','id'=>'technicians', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-3">
                    {{Form::label('technologists','Lab.Technologists')}}
                    {{Form::text('technologists',0,['class'=>'form-control','id'=>'technologists', 'placeholder' =>'0'])}}
                </div>  
                 
            </div> 
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-4">
                    {{Form::label('vhw','Village Health Worker')}}
                    {{Form::text('vhw',0,['class'=>'form-control','id'=>'vhw', 'placeholder' =>'0'])}}
                </div>
                <div class="form-group col-md-4">
                    {{Form::label('staff','Support Staff')}}
                    {{Form::text('staff',0,['class'=>'form-control','id'=>'staff', 'placeholder' =>'0'])}}
                </div> 
                <div class="form-group col-md-4">
                    {{Form::label('ambulance','Ambulance')}}
                    {{Form::text('ambulance',0,['class'=>'form-control','id'=>'ambulance', 'placeholder' =>'0'])}}
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