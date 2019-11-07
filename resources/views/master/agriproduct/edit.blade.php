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
        <h3>Edit: Agriculture Products</h3><hr>
        {!! Form::open(['action' => ['MasterAgriProductController@update',$datas->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Category</label>
                <select id="category" name="category" class="form-control" required>
                    <option value=''>Select Category</option>
                    @foreach($sector as $sectors)
                        <option value="{{$sectors->id}}" {{($sectors->id==$datas->category) ? 'selected' : ''}}>{{$sectors->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('name','Product')}}
                {{Form::text('product',$datas->product,['class'=>'form-control','placeholder'=>'Product'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
