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
        <h3>Edit: Agency</h3><hr>
        {!! Form::open(['action' => ['MasterSubsectorController@update',$datas->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Sector</label>
                <select id="sector" name="sector" class="form-control" required>
                    <option value=''>Select Sector</option>
                    @foreach($sector as $sectors)
                        <option value="{{$sectors->id}}" {{($sectors->id==$datas->sector_id) ? 'selected' : ''}}>{{$sectors->sector}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('name','Name of User')}}
                {{Form::text('subsector',$datas->subsector,['class'=>'form-control','placeholder'=>'Agency Name'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
