@extends('layouts.super-app')
@section('content')
<style>
    .card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */
}
</style>
    <div class="card card-body" style="max-width: 40rem;">
        <h3>Edit: Administrator</h3><hr>
        {!! Form::open(['action' => ['UserController@update',$datas->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                {{Form::label('email','Email')}}
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $datas->email }}" required autocomplete="email" placeholder="Email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{Form::label('name','Name of User')}}
                {{Form::text('name',$datas->name,['class'=>'form-control','placeholder'=>'User Name'])}}
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
    $(document).ready( function () {
        $("#sector").on('change',function(e){
            console.log(e);
            var sector_id = e.target.value;
            $.get('/json-subsector?sector_id=' + sector_id, function(data){
                console.log(data);
                $('#subsector').empty();
                $('#subsector').append('<option value="">Select Agency</option>');
                $.each(data, function(index, subsectorObj){
                    $('#subsector').append('<option value="'+ subsectorObj.id +'">'+ subsectorObj.subsector + '</option>');
                })
            });

        });
    });

    
</script>